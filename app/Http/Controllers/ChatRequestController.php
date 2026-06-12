<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatRequest;

class ChatRequestController extends Controller
{
    public function index()
    {
        return view('find-user');
    }

    public function send(Request $request)
    {
        $request->validate([
            'unique_code' => 'required|digits:6'
        ]);

        // Find receiver by unique code
        $receiver = User::where(
            'unique_code',
            $request->unique_code
        )->first();

        // User not found
        if (!$receiver) {
            return back()->with(
                'error',
                'No user found with this code.'
            );
        }

        // Prevent self request
        if ($receiver->id == auth()->id()) {
            return back()->with(
                'error',
                'You cannot send a request to yourself.'
            );
        }

        // Check if request already exists
        $existingRequest = ChatRequest::where(
            'sender_id',
            auth()->id()
        )
        ->where(
            'receiver_id',
            $receiver->id
        )
        ->where(
            'status',
            'pending'
        )
        ->first();

        if ($existingRequest) {
            return back()->with(
                'error',
                'Request already sent.'
            );
        }

        // Save request
        ChatRequest::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id,
            'status' => 'pending'
        ]);

        return back()->with(
            'success',
            'Request sent successfully to '.$receiver->name
        );
    }
}
