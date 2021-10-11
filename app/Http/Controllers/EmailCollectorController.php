<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailCollector;

class EmailCollectorController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required"
        ]);
        
        // Create Signup
        $emailCollection = new EmailCollector;
        $emailCollection->firstname = $request->input("firstname");
        $emailCollection->lastname = $request->input("lastname");
        $emailCollection->email = $request->input("email");
        if ($emailCollection->email == EmailCollector::find($emailCollection->email)->email ){
            return redirect('/')->with("error", "You have already signed up");
        }

        $emailCollection->save();
        
        return redirect("/")->with("success", "Your email has been saved");
    }
}
