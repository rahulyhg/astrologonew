<?php namespace App\Repositories;

use App\Models\Contacts;
use Jenssegers\Agent\Agent;

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
        $contact->ip =  \Request::ip();

        $agent = new Agent();
        $lang = $agent->languages();
        $lang=implode(",", $lang);
        $platform = $agent->platform();
        $version_p = $agent->version($platform);
        $device = $agent->device();
        $browser = $agent->browser();
        $version_b = $agent->version($browser);

        $contact->agent=$platform.$version_p."|".$device."|".$browser.$version_b."|".$lang;


        $contact->save();
    }


  //KADMIN

    public function index()
    {
        return $this->model
            ->oldest('seen')
            ->latest()
            ->get();
    }

    public function update($seen, $id)
    {
        $contact = $this->getById($id);

        $contact->seen = $seen == 'true';

        $contact->save();
    }






}