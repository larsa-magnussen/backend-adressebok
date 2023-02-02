<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotesStoreRequest;
use App\Http\Requests\NotesUpdateRequest;
use App\Models\Contact;
use App\Models\ContactNote;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        return $contact->notes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotesStoreRequest $request, Contact $contact)
    {
        return $contact->notes()->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact, ContactNote $note)
    {
        return $note;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotesUpdateRequest $request, Contact $contact, ContactNote $note)
    {
        return $note->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, ContactNote $note)
    {
        return $note->delete();
    }
}
