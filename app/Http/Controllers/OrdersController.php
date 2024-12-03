<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\orders;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\ProcessedOrder;

class OrdersController extends Controller
{
    /** API URL */
    public $api_url = 'https://secsers.com/api/v2';

    /** Your API key */
    public $api_key = 'cb80000db550dc7690b6114ea147d00b';
    private function connect($post)
    {
        $_post = [];
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name . '=' . urlencode($value);
            }
        }

        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;
    }


    public function index()
    {
        $product = product::orderBy('name')->get(); // Fetch products ordered by name

        return view('main', compact('product'));
    }




    public function order(Request $request)
    {
        $request->validate(
            [
                'service' => 'required',
                'link' => 'required|url',
                'quantity' => 'required|numeric',
            ]
        );

        $orders = new orders;
        $orders->user_id = auth()->user()->id;
        $orders->service = $request->input('service');
        $orders->link = $request->input('link');
        $orders->quantity = request('quantity');


        $product = product::where('value', request('service'))->firstOrFail(); // Retrieve the product instance
        $price = $product->price_per_1000;
        $orders->price =  $price * 0.001 * request('quantity');


        $user = auth()->user();
        if ($orders->price > $user->balance) {
            return redirect()->route('main')->with('error', 'Insufficient balance');
        }

        $post = array_merge([
            'key' => $this->api_key,
            'action' => 'add',
            'service' => request('service'),
            'link' => request('link'),
            'quantity' => request('quantity')
        ]);
        $api_response = $this->connect($post);
        $response_data = json_decode($api_response, true);
        if (isset($response_data['error'])) {
            // Handle the validation error
            return redirect()->route('main')->with('error', $response_data['error']);
        }
        $order_id = $response_data['order'];
        $orders->order_id = $order_id;
        $orders->save();
        $user = User::where('id', auth()->user()->id)->first();
        $currentBalance = $user->balance;
        $user->balance = $currentBalance - $orders->price;
        $user->save();


        return redirect()->route('orders')->with('success', 'orders created successfully');
    }
    public function ordersview()
    {

        $servicesApiResponse = $this->connect(['key' => $this->api_key, 'action' => 'services']);
        $servicesData = json_decode($servicesApiResponse, true);

        // Map service IDs to their names
        $services = [];
        foreach ($servicesData as $service) {
            $services[$service['service']] = $service['name'];
        }


        $order_ids = orders::where('user_id', auth()->user()->id)->pluck('order_id')->toArray();

        $post = array_merge([
            'key' => $this->api_key,
            'action' => 'status',
            'orders' => implode(',', $order_ids),
        ]);
        // return json_decode($this->connect($post));

        $api_response = $this->connect($post);
        // dd($api_response);
        $response_data = json_decode($api_response, true);



        $orders = orders::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();


        $processedOrderIds = [];

        // Iterate through orders and check for canceled status
        foreach ($orders as $order) {
            if ($response_data[$order->order_id]['status'] == 'Canceled' && !in_array($order->order_id, $processedOrderIds)) {
                // Call the function to return price to user's balance
                $this->returnPriceToUserBalance($order->order_id);

                // Add the processed order ID to the array
                $processedOrderIds[] = $order->order_id;
            }
        }

        return view('users.orders', compact('orders', 'response_data', 'services'));
    }

    public function returnPriceToUserBalance($orderId)
    {
        $order_ids = orders::where('user_id', auth()->user()->id)->pluck('order_id')->toArray();

        $post = array_merge([
            'key' => $this->api_key,
            'action' => 'status',
            'orders' => implode(',', $order_ids),
        ]);
        // return json_decode($this->connect($post));

        $api_response = $this->connect($post);
        // dd($api_response);
        $response_data = json_decode($api_response, true);

        // Check if the order ID is already processed
        if (ProcessedOrder::where('order_id', $orderId)->exists()) {
            return false; // Order already processed, no action needed
        }

        // Find the order by order ID
        $order = orders::where('order_id', $orderId)->first();

        if ($order && $response_data[$order->order_id]['status'] == 'Canceled') {
            // Find the user associated with the order
            $user = $order->user;

            // Calculate the amount to return to the user's balance
            $amountToReturn = $order->price;

            // Add the amount back to the user's balance
            $user->balance += $amountToReturn;

            // Save the updated balance
            $user->save();

            // Create a record in the processed_orders table to mark the order as processed
            ProcessedOrder::create(['order_id' => $orderId]);

            return true; // Indicate success
        }
    }

    public function orderbystatus($status)
    {

        $servicesApiResponse = $this->connect(['key' => $this->api_key, 'action' => 'services']);
        $servicesData = json_decode($servicesApiResponse, true);

        // Map service IDs to their names
        $services = [];
        foreach ($servicesData as $service) {
            $services[$service['service']] = $service['name'];
        }

        // Validate the $status parameter
        $validStatuses = ['pending', 'In progress', 'completed', 'partial', 'processing', 'canceled']; // Add other valid statuses if needed
        // if (!in_array(strtolower($status), $validStatuses)) {
        //     return redirect()->route('orders')->with('error', 'Invalid status.');
        // }

        $userId = auth()->user()->id;
        $orders = null;

        $orderIds = orders::where('user_id', $userId)->pluck('order_id')->toArray();

        if (empty($orderIds)) {
            // Handle the case where there are no orders
            return view('users.orders')->with('orders', []);
        }

        $post = [
            'key' => $this->api_key,
            'action' => 'status',
            'orders' => implode(',', $orderIds),
        ];

        $api_response = $this->connect($post);
        $response_data = json_decode($api_response, true);

        // Check if response data is empty
        if (empty($response_data)) {
            // Handle the case where there is no response data
            return view('users.orders')->with('orders', []);
        }

        // Normalize the status strings for comparison
        $normalizedStatus = strtolower($status);

        // Filter orders based on the normalized status
        $filteredOrderIds = array_keys(array_filter($response_data, function ($order) use ($normalizedStatus) {
            return isset($order['status']) && strtolower($order['status']) === $normalizedStatus;
        }));

        // Check if any orders match the status
        if (empty($filteredOrderIds)) {
            // Handle the case where there are no orders with the specified status
            return view('users.orders')->with('orders', []);
        }

        // Retrieve orders based on filtered order IDs
        $orders = orders::where('user_id', $userId)
            ->whereIn('order_id', $filteredOrderIds)
            ->get();



        // Pass the $status variable to the view
        return view('users.orders', compact('orders', 'response_data', 'status', 'services'));
    }





    public function services()
    {
        return json_decode(
            $this->connect([
                'key' => $this->api_key,
                'action' => 'services',
            ])
        );
    }


    public function search(Request $request)
    {

        $request->validate(
            [
                'search' => 'required|min:5',

            ]
        );
        $search = $request->input('search');
        $userId = auth()->user()->id;

        // Retrieve order IDs belonging to the authenticated user
        $orderIds = orders::where('user_id', $userId)->pluck('order_id')->toArray();

        // Retrieve statuses for the orders
        $post = [
            'key' => $this->api_key,
            'action' => 'status',
            'orders' => implode(',', $orderIds),
        ];

        $apiResponse = $this->connect($post);
        $responseData = json_decode($apiResponse, true);

        // Filter order IDs based on the search status
        $filteredOrderIds = [];
        foreach ($responseData as $orderId => $orderStatus) {
            if (is_array($orderStatus) && isset($orderStatus['status']) && strpos(strtolower($orderStatus['status']), strtolower($search)) !== false) {
                $filteredOrderIds[] = $orderId;
            }
        }

        // Perform the search query using your orders model
        $orders = orders::where('user_id', $userId)
            ->whereIn('order_id', $filteredOrderIds)
            ->orWhere('link', 'like', '%' . $search . '%')
            ->get();



        return view('users.orders', [
            'orders' => $orders,
            'response_data' => $responseData
        ]);
    }




    // public function index(Request $request)
    // {

    //     return json_decode(
    //         $this->connect([
    //             'key' => 'f9d1395d75f3508c757393bfed669bed',
    //             'action' => 'add',
    //             'service' => 43,
    //             'link' => 'https://www.instagram.com/p/Cu81O9eokBk/',
    //             'quantity' => 200
    //         ])
    //     );

    //     // return json_decode(
    //     //     $this->connect([
    //     //         'key' => 'f9d1395d75f3508c757393bfed669bed',
    //     //         'action' => 'balance',
    //     //         'order' => 16064055
    //     //     ])
    //     // );

    // }
}
