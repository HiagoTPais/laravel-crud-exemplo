<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();

        return view('dashboard', compact('contacts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $response = Contacts::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone")
        ]);

        return redirect('/dashboard');
    }

    public function delete($id)
    {
        Contacts::findOrFail($id)->delete();

        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $contacts = Contacts::findOrFail($id);

        return view('edit', compact('contacts'));
    }

    public function update(Request $request, $id)
    {
        $contacts = Contacts::find($id);

        $contacts->name = $request->input("name");
        $contacts->email = $request->input("email");
        $contacts->phone = $request->input("phone");

        $contacts->save();

        return redirect('/dashboard');
    }
}
