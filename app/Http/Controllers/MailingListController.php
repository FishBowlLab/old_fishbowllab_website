<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailingList;

class MailiingListController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required"
        ]);
        
        // Create Signup
        $mailingList = new MailingList();
        $mailingList->firstname = $request->input("firstname");
        $mailingList->lastname = $request->input("lastname");
        $mailingList->email = $request->input("email");
        if ($mailingList->email == MailingList::find($mailingList->email)->email ){
            return redirect('/')->with("error", "You have already signed up");
        }

        $mailingList->save();
        
        return redirect("/")->with("success", "Your email has been saved");
    }
}
