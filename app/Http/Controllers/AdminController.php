<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function dashboard()
{
    return view('admin.dashboard', [
        'users' => \App\Models\User::count(),
        'messages' => \App\Models\Message::count(),
        'pendingRequests' => \App\Models\ChatRequest::where('status','pending')->count(),
        'contacts' => \App\Models\Contact::count(),
        'latestMessages' => \App\Models\Message::with(['sender','receiver'])
                                ->latest()
                                ->take(8)
                                ->get(),
        'todayUsers' => \App\Models\User::whereDate('created_at', today())->count(),
        'todayMessages' => \App\Models\Message::whereDate('created_at', today())->count(),
        'seenMessages' => \App\Models\Message::where('is_seen', true)->count(),
        'unseenMessages' => \App\Models\Message::where('is_seen', false)->count(),
    ]);
}

   public function messages()
{
    $messages = Message::with(['sender', 'receiver'])
        ->latest()
        ->paginate(20);

    return view('admin.messages', compact('messages'));
}

    public function decrypt($id)
{
    $message = Message::findOrFail($id);

    try {

        $text = Crypt::decryptString(
            $message->getRawOriginal('message')
        );

    } catch (\Exception $e) {

        $text = "Unable to decrypt this message.";

    }

    return view('admin.decrypt', [
        'message' => $message,
        'text' => $text
    ]);
}
}