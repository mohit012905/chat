<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('user')
    ->where('user_id', auth()->id())
    ->get();

        return view(
            'contacts.index',
            compact('contacts')
        );
    }
}