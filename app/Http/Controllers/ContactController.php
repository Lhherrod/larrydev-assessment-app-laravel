<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller {
    
    public function create (ContactRequest $request) {

        ContactService::getCaptcha();

        Contact::create($request->validated());
        
        return back()->with('status', 'Contact request received thank you.');
    }

}
