<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() 
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());
        // return redirect(route('contact'))->with('status', 'contact-recieved');
        return back()->with(['status' => 'contact-recieved']);
    }
}