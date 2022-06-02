<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;

class ContactController extends Controller
{
    public function index()
    {
        $companies=Company::orderBy('name')->pluck('name','id')->prepend('All Companies', '');
       
        $contacts=Contact::orderBy('id','desc')->where(function($query){
            if($companyId=request('company_id')){
                $query->where('company_id', $companyId);
            }
        })->paginate(5);
        return view('contacts.contacts', compact('contacts','companies'));
    }

    public function create()
    {
        $contact = new Contact();
        $companies=Company::orderBy('name')->pluck('name','id')->
        prepend('All Companies', '');

        return view('contacts.create', compact('companies', 'contact'));

    }
    public function show($id)
    {
        $contact= Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }
    public function store(Request $request)
    {

        
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'phone'=>'required',
            'company_id'=>'required|exists:companies,id',
        ]);
        
        Contact::create($request->all());

        return redirect()->route('contacts.contact')->with('message', 'Contact has been added succesfully');
    }
    public function edit($id)
    {
        $contact=Contact::findOrFail($id);
        $companies=Company::orderBy('name')->pluck('name','id')->prepend('All Companies', '');

        return view('contacts.edit', compact('contact','companies'));

        
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'phone'=>'required',
            'company_id'=>'required|exists:companies,id',
        ]);
        
        $contact=Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.contact')->with('message', 'Contact has been updated succesfully');
    }
    public function destroy($id)
    {
        $contact=Contact::findOrFail($id);
        $contact->delete();
        return back()->with('message', 'Contact has been deleted succesfully');
    }
}
