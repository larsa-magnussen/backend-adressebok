<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailsUpdateRequest;
use App\Http\Requests\EmailsStoreRequest;
use App\Models\Contact;
use App\Models\ContactEmail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        return $contact->emails;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailsStoreRequest $request, Contact $contact)
    {
        return $contact->emails()->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact, ContactEmail $email)
    {
        return $email;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailsUpdateRequest $request, Contact $contact, ContactEmail $email)
    {
        return $email->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, ContactEmail $email)
    {
        return $email->delete();
    }
}
