<?php

namespace App\Http\Controllers\Admin;

use App\Models\orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersControllerAdmin extends Controller
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

        $order_ids = orders::all()->pluck('order_id')->toArray();

        $post = array_merge([
            'key' => $this->api_key,
            'action' => 'status',
            'orders' => implode(',', $order_ids),
        ]);
        // return json_decode($this->connect($post));

        $api_response = $this->connect($post);
        // dd($api_response);
        $response_data = json_decode($api_response, true);


        $servicesApiResponse = $this->connect(['key' => $this->api_key, 'action' => 'services']);
        $servicesData = json_decode($servicesApiResponse, true);

        // Map service IDs to their names
        $services = [];
        foreach ($servicesData as $service) {
            $services[$service['service']] = $service['name'];
        }

        $orders = orders::orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders', 'response_data', 'services'));
    }

    public function search(Request $request)
    {

        $order_ids = orders::all()->pluck('order_id')->toArray();

        $post = array_merge([
            'key' => $this->api_key,
            'action' => 'status',
            'orders' => implode(',', $order_ids),
        ]);
        // return json_decode($this->connect($post));

        $api_response = $this->connect($post);
        // dd($api_response);
        $response_data = json_decode($api_response, true);


        $search = $request->input('search');

        $filteredOrderIds = [];
        foreach ($response_data as $orderId => $orderStatus) {
            if (is_array($orderStatus) && isset($orderStatus['status']) && strpos(strtolower($orderStatus['status']), strtolower($search)) !== false) {
                $filteredOrderIds[] = $orderId;
            }
        }

        $servicesApiResponse = $this->connect(['key' => $this->api_key, 'action' => 'services']);
        $servicesData = json_decode($servicesApiResponse, true);

        // Map service IDs to their names
        $services = [];
        foreach ($servicesData as $service) {
            $services[$service['service']] = $service['name'];
        }

        // Perform the search query using your orders model
        $orders = orders::whereIn('order_id', $filteredOrderIds)
            ->orWhere('order_id', 'like', '%' . $search . '%')
            ->orWhere('service', 'like', '%' . $search . '%')
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('email', 'like', '%' . $search . '%');
            })
            ->get();
        return view('admin.orders', ['orders' => $orders, 'response_data' => $response_data, 'services' => $services]);
    }
}
