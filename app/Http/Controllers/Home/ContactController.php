<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function Contact(){
        return view('frontend.contact');
    }

    public function StoreMessage(Request $request){

        Contact::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'phone'=> $request->phone,
            'message'=> $request->message,
            'created_at'=> Carbon::now(),

        ]);

        $notification = array(
            'message' => "Your Message Sumbited Successfully",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notification);

    }

    public function ContactMessage(){
         $contact = Contact::latest()->get();
         return view('admin.conatact.contact_message', compact('contact'));
    }

    public function DeleteMessage($id){

    $contact = Contact::findOrFail($id);

    Contact::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Contact Delete Successfully',
        'alert-type' => 'success',
    );

    return redirect()->back()->with($notification);
}
}
