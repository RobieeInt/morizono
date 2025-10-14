<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactShowController extends Controller
{
    public function __invoke(Contact $contact)
    {
        if (is_null($contact->read_at)) {
            $contact->forceFill(['read_at' => now()])->save();
        }
        return view('admin.message-show', compact('contact'));
    }
}
