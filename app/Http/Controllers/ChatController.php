<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index($id)
    {
        // Update current user's last seen
        auth()->user()->update([
            'last_seen' => now()
        ]);

        $receiver = User::findOrFail($id);

        // Mark messages as seen
        Message::where('sender_id', $id)
            ->where('receiver_id', auth()->id())
            ->update([
                'is_seen' => true
            ]);

        $messages = Message::where(function ($q) use ($id) {

                $q->where('sender_id', auth()->id())
                  ->where('receiver_id', $id);

            })
            ->orWhere(function ($q) use ($id) {

                $q->where('sender_id', $id)
                  ->where('receiver_id', auth()->id());

            })
            ->orderBy('id')
            ->get();

        return view(
            'chat.index',
            compact('receiver', 'messages')
        );
    }

    public function send(Request $request)
    {
        // Update current user's last seen
        auth()->user()->update([
            'last_seen' => now()
        ]);

        $request->validate([
            'message' => 'required|max:5000',
            'receiver_id' => 'required|exists:users,id'
        ]);

        Message::create([
            'sender_id'   => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message'     => $request->message,
            'is_seen'     => false
        ]);

        return redirect()->route(
            'chat.index',
            $request->receiver_id
        );
    }
    public function typing(Request $request)
{
    auth()->user()->update([
        'typing_to' => $request->receiver_id
    ]);

    return response()->json([
        'success' => true
    ]);
}
}
