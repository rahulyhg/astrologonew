<?php

namespace App\Http\Controllers\Astro;

use App\Http\Controllers\Controller;
use App\Repositories\ContactsRepository;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;

class ContactsController extends Controller {


    public function index()
    {

        return view('astro.contacts');


    }

//        ContactRepository $contact_gestion,
    public function store(ContactsRepository $contacts_gestion, ContactsRequest $request)
    {

        $contacts_gestion->store($request->all());
        $req=$request->all();

       // print $req[email];// Почта!!!


        print $req['email'];

        //print_r($req);
        //exit;

       // {{config('mail.username')}}
        /*
       \Mail::raw('Текст письма', function($message)
        {
            $message->from('hello@astrologo.ru', 'Astrologo');
            $message->to('pumi@ya.ru');
        });
        */

        return redirect('contacts')->with('ok', trans('astro/contacts.ok'));
    }


}
