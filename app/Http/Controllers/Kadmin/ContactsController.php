<?php

namespace App\Http\Controllers\Kadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use App\Repositories\ContactsRepository;



class ContactsController extends Controller {

    /**
     * Create a new ContactController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['create', 'store']]);
        $this->middleware('ajax', ['only' => 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  ContactRepository $contact_gestion
     * @return Response
     */
    public function index(
        ContactsRepository $contact_gestion)
    {
        $messages = $contact_gestion->index();

        return view('kadmin.contacts.index', compact('messages'));
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  App\Repositories\ContactRepository $contact_gestion
     * @param  Illuminate\Http\Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(
        ContactsRepository $contact_gestion,
        Request $request,
        $id)
    {
        $contact_gestion->update($request->input('seen'), $id);

        return response()->json(['statut' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Repositories\ContactRepository $contact_gestion
     * @param  int  $id
     * @return Response
     */
    public function destroy(
        ContactsRepository $contact_gestion,
        $id)
    {
        $contact_gestion->destroy($id);

        return redirect('kadmin/contacts');
    }

}
