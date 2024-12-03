<?php

namespace App\Http\Controllers\Admin;

use App\Models\tickets;
use App\Models\viewticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TicketsControllerAdmin extends Controller
{
    public function index()
    {
        $tickets = tickets::all();
        return view('admin.ticket.ticket', compact('tickets'));
    }

    public function getMessages($id)
    {
        // Retrieve the ticket with the given ID

    $ticket = tickets::findOrFail($id);
    $tickets = tickets::all();

    // Initialize an empty array to store messages
    $messages = [];

    // Check if the ticket has messages
    if ($ticket->messages) {
        // Unserialize the messages and add them to the $messages array
        $ticketMessages = unserialize($ticket->messages);
        $messageCount = count($ticketMessages);

        $messages[$ticket->id] = $ticketMessages; // Store messages with ticket ID as key
    }

    // Pass the ticket and messages to the view
    return view('admin.ticket.ticketmessge', compact('ticket', 'messages','tickets','messageCount','id'));
    }


    public function create(Request $request)
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
            'isadmin' => $request->input('is_admin', true), // Set isadmin based on input
            'updated_at' => now()->toDateTimeString(), // Add created_at timestamp
        ];

        // Serialize the updated array
        $serializedMessages = serialize($messages);

        // Update the ticket record with the new serialized messages
        DB::table('tickets')
            ->where('id', $request->input('ticket_id'))
            ->update(['messages' => $serializedMessages,
             'status'=> 'answered']);

        $ticket->save();

        // Redirect back with success message
        return redirect('get-messages/'. $request->input('ticket_id'))->with('success', 'Message added successfully');
    }

    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'status' => ['required', Rule::in(['answered', 'pending', 'closed'])],
        ]);
    
        // Find the ticket by ID or fail if not found
        $ticket = tickets::findOrFail($request->input('ticket_id'));
    
        // Update the status
        $ticket->status = $request->input('status');
        $ticket->save();
    
        return redirect()->route('admin-ticket')->with("success", 'Ticket updated');
    }

    // public function search(Request $request)
    // {

        
    
    //     $search = $request->input('search');
    //     // Perform the search query using your orders model
    //     $ticket = tickets::whereHas('user', function($query) use ($search) {
    //            $query->where('email', 'like', '%' . $search . '%')
    //               ->orWhere('name', 'like', '%' . $search . '%');
    //     })
    //     ->get();
        
    //         return view('admin.ticket.ticketmessge', ['ticket' => $ticket]);
    // }

}
