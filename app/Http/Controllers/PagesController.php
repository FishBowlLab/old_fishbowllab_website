<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailingList;

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
        MailingList::create([
            "firstname" => $request->input("firstname"),
            "lastname" => $request->input("lastname"),
            "email" => $email,
        ]);
        return redirect("/")->with("success", "You have successfully signed up");   
    }
}
