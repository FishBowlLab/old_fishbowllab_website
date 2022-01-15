<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Models\MailingList;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to Fishbowl Labs";
        return view("pages.index")->with("title", $title);
    }
    public function about(){
        $title = "About Us";
        return view("pages.about")->with("title", $title);
    }
    public function products(){
        $title = "Products";
        return view("pages.products")->with("title", $title);
    }

    public function store(Request $request)
    {
        // This method needs to be protected
        $this->validate($request, [
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required",
        ]);
        $email = $request->input("email");
        
        if(MailingList::where("email", $email)->count() >0 ){
            return redirect('/')->with("error", "You have already signed up");
        }

        // Default Case
        $mailingList = MailingList::create([
                    "firstname" => ucwords($request->input("firstname")),
                    "lastname" => ucwords($request->input("lastname")),
                    "email" => $email,
        ]);

        // Email signup and validation
        Mail::to($email)->send(new WelcomeMail($mailingList->firstname));
        if(Mail::failures()){
            return redirect("/")->with("error", "Sorry! Please try again later");
        }

        return redirect("/")->with("success", "You have successfully signed up");   
    }
}
