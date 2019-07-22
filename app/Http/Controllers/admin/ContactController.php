<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {

      $contacts = Contact::all();
      return view('admin.contact.index',compact('contacts'));
    }
    public function show ($id)
    {
      $contact = Contact::find($id);
      // return $contact;
      return view('admin.contact.show',compact('contact'));
    }

    public function destroy($id)
    {
      $contact = Contact::find($id);
      // return $contact;
      Contact::find($id)->delete();
      Toastr::success('Contact successfully deleted.','Success',["positionClass" => "toast-top-right"]);
      return redirect()->back();
    }
}
