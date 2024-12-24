<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        // Retrieve all messages from the database
        $messages = Message::all();

        // Return the view for the admin panel and pass the messages
        return view('admin.messages', compact('messages'));
    }
    public function store(Request $request)
    
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Create a new message
    Message::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    return redirect()->back()->with('success', 'Message sent successfully!');
}

    }
//

