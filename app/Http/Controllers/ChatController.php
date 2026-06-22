<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ChatController extends Controller
{
    public function index($id)
    {
        // Update current user's last seen
        auth()->user()->update([
            'last_seen' => now()
        ]);

        $receiver = User::findOrFail($id);

        // Mark received messages as seen
        Message::where('sender_id', $id)
            ->where('receiver_id', auth()->id())
            ->update([
                'is_seen' => true
            ]);

        // Fetch conversation
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

        // Decrypt messages for normal users
        $messages->transform(function ($message) {
            try {
                $message->message = Crypt::decryptString($message->getRawOriginal('message'));
            } catch (\Exception $e) {
                $message->message = '[Unable to decrypt message]';
            }

            return $message;
        });

        return view('chat.index', compact('receiver', 'messages'));
    }

    public function send(Request $request)
    {
        auth()->user()->update([
            'last_seen' => now()
        ]);

        $request->validate([
            'message' => 'required|string|max:5000',
            'receiver_id' => 'required|exists:users,id'
        ]);

        Message::create([
            'sender_id'   => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message'     => Crypt::encryptString($request->message),
            'is_seen'     => false,
        ]);

        return redirect()->route('chat.index', $request->receiver_id);
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

    public function fetchMessages($id)
    {
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

        // Decrypt messages for AJAX refresh
        $messages->transform(function ($message) {
            try {
                $message->message = Crypt::decryptString($message->getRawOriginal('message'));
            } catch (\Exception $e) {
                $message->message = '[Unable to decrypt message]';
            }

            return $message;
        });

        return view('chat.partials.messages', compact('messages'));
    }
}