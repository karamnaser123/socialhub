<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\tickets;
use App\Models\viewticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Ticket;

class TicketsController extends Controller
{
    public function tickets()
    {
        $user = auth()->user();
        $tickets = tickets::where('user_id', $user->id)->get();
        return view('users.tickets', compact('tickets'));
    }
    public function createticket(Request $request)
    {

        $user = auth()->user();


        // $order = orders::where('user_id', $user->id)->find(request('order_id'));
        // if (!$order) {
        //     return redirect()->route('tickets')->with('error', 'This Order not found');
        // }

        $request->validate(
            [
                'message' => 'required|string|min:10|max:255',
                'order_id' => 'nullable|exists:orders,id',
            ]
        );


        $ticket = new tickets;
        $messages = $ticket->messages ? unserialize($ticket->messages) : [];

        // Add the new message to the array
        $messages[] = [
            'message' => $request->input('message'),
            'isadmin' => $request->input('is_admin', false), // Set isadmin based on input
            'updated_at' => now()->toDateTimeString(), // Add created_at timestamp
        ];

        // Serialize the updated array
        $serializedMessages = serialize($messages);

        $ticket->user_id = $user->id;
        $ticket->order_id = request('order_id');
        $ticket->subject = request('subject');
        $ticket->request = request('request');
        $ticket->messages = $serializedMessages;
        $ticket->status = 1;
        $ticket->save();



        return redirect()->route('tickets')->with('success', 'The ticket was created successfully');
    }

    public function viewticket(string $id)
    {
        $user = auth()->user();
        $ticket = tickets::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        // Deserialize the messages array from the database
        $messages = [];
        if ($ticket && $ticket->messages) {
            $messages = unserialize($ticket->messages);
        }

        return view('users.viewticket', compact('messages', 'ticket'));
    }


    public function addmessage(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'message' => 'required|string',
            'is_admin' => 'nullable|boolean', // Assuming you have a checkbox or similar input for this
        ]);

        // Fetch existing messages array from the database
        $ticket = tickets::find($request->input('ticket_id'));

        // Deserialize the existing messages or initialize an empty array if null
        $messages = $ticket->messages ? unserialize($ticket->messages) : [];

        // Add the new message to the array
        $messages[] = [
            'message' => $request->input('message'),
            'isadmin' => $request->input('is_admin', false), // Set isadmin based on input
            'updated_at' => now()->toDateTimeString(), // Add created_at timestamp
        ];

        // Serialize the updated array
        $serializedMessages = serialize($messages);

        // Update the ticket record with the new serialized messages
        DB::table('tickets')
            ->where('id', $request->input('ticket_id'))
            ->update(['messages' => $serializedMessages]);

        // Update ticket status if necessary
        $ticket->status = 'pending';
        $ticket->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Message added successfully');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Perform the search query using your tickets model
        $tickets = tickets::where('user_id', auth()->user()->id)
            ->where(function ($query) use ($search) {
                $query->where('status', 'like', '%' . $search . '%')
                    ->orWhere('order_id', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
            ->get();
    
        return view('users.tickets', ['tickets' => $tickets]);
    }
    
}
