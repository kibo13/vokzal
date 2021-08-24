<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function main()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.contacts'));

    // category
    $category = getCategory(config('constants.slug.contacts'));

    // contact
    $contact = Contact::first() ?? null;

    return view('pages.contacts', compact('title', 'category', 'contact'));
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.contacts'));

    // category
    $category = getCategory(config('constants.slug.contacts'));

    // contact
    $contact = Contact::first();

    return view('admin.pages.contacts.form', compact('contact', 'title', 'contact'));
  }

  public function update(Request $request, Contact $contact)
  {
    $contact->update($request->all());

    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('contacts.index');
  }
}