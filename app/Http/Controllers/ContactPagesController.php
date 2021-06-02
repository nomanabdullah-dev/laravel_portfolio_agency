<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactPagesController extends Controller
{
    public function list()
    {
        $contacts = Message::all();
        return view('pages.contacts.list', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Message::find($id);
        return view('pages.contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contacts = Message::find($id);
        $contacts->delete();

        return redirect()->route('admin.contacts.list')->with('success','Message Deleted Successfully');
    }
}
