<?php

namespace App\Http\Controllers\Astro;

use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;

class ContactsController extends Controller {


    public function index()
    {
        return view('astro.contacts');
    }

//        ContactRepository $contact_gestion,
    public function store( ContactsRequest $request)
    {


        //$contact_gestion->store($request->all());

        return redirect('contacts')->with('ok', trans('front/contact.ok'));
    }


}
