<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Subscribe;

class ContactController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $models=Contact::paginate(6);
        return view('admin.contact.index',['models'=>$models]);
    }

    public function destroy(Contact $contact)
    {
        Contact::destroy($contact);
        return redirect()->back();
    }


}
