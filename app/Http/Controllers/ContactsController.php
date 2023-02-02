<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsIndexRequest;
use App\Http\Requests\ContactsStoreRequest;
use App\Http\Requests\ContactsUpdateRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\ContactEmail;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //søkefunksjon, nå vil index-siden vise kontakter som inneholder søkekriteriene bak "?search=":
    // http://127.0.0.1:8000/api/contacts?search=a
    //denne metoden vil se etter fornavn eller etternavn som inneholder inputen bak "?search="
    public function index(ContactsIndexRequest $request)
    {
        $search = $request->input('search');
        $contacts = Contact::where(Contact::FIRST_NAME, 'like', '%' . $search . '%')->
        orWhere(Contact::LAST_NAME, 'like', '%' . $search . '%')->
        orWhere(Contact::ADDRESS, 'like', '%' . $search . '%')->
        orWhere(Contact::COUNTRY, 'like', '%' . $search . '%')->
        orWhere(Contact::PHONE_NUMBER, 'like', '%' . $search . '%')->
        orWhereHas('emails', function($query) use ($search) {
            $query->where(ContactEmail::EMAIL_ADDRESS, 'like', '%' . $search . '%');
        })->get();

        return ContactResource::collection($contacts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //metode som oppretter ny kontakt i databasen basert på en request
    public function store(ContactsStoreRequest $request)
    {
        return Contact::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //finner personen i databasen basert på id i url, her "3": http://127.0.0.1:8000/api/contacts/3
    public function show($id)
    {
        $contact = Contact::find($id);
        return ContactResource::make($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactsUpdateRequest $request, $id)
    {
        return Contact::findOrFail($id)->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //sletter en person fra databasen basert på id i url, her "3": http://127.0.0.1:8000/api/contacts/3
    //i tillegg returnerer den også kontakten som ble slettet
    public function destroy($id)
    {
        return Contact::findOrFail($id)->delete();
    }
}
