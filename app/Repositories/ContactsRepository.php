<?php namespace App\Repositories;

use App\Models\Contacts;

class ContactsRepository extends BaseRepository
{

    public function __construct(Contacts $contacts)
    {
        $this->model = $contacts;
    }


    public function store($inputs)
    {
        $contact = new $this->model;

        $contact->name = $inputs['name'];
        $contact->email = $inputs['email'];
        $contact->text = $inputs['message'];
       // $contact->ip = $_SERVER["REMOTE_ADDR"];
        $contact->ip =  \Request::ip();


        $contact->save();
    }

}