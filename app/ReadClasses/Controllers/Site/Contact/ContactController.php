<?php

namespace App\Http\Controllers\Site\Contact;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function show()
    {
        return view('site.contact.show');
    }
}
