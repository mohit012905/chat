<?php

namespace App\Http\Controllers;

use App\Models\ChatRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = ChatRequest::with('sender')
            ->where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->get();

        return view(
            'requests.index',
            compact('requests')
        );
    }

    public function accept($id)
    {
        $request = ChatRequest::findOrFail($id);

        // Update request status
        $request->status = 'accepted';
        $request->save();

        // Create contact for sender
        Contact::firstOrCreate([
            'user_id' => $request->sender_id,
            'contact_id' => $request->receiver_id
        ]);

        // Create contact for receiver
        Contact::firstOrCreate([
            'user_id' => $request->receiver_id,
            'contact_id' => $request->sender_id
        ]);

        return redirect()
            ->route('contacts.index')
            ->with(
                'success',
                'Request accepted successfully.'
            );
    }

    public function reject($id)
    {
        $request = ChatRequest::findOrFail($id);

        $request->status = 'rejected';
        $request->save();

        return back()->with(
            'success',
            'Request rejected successfully.'
        );
    }
}
