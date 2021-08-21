<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function accInfo () {
        return view("users/info",["user"=>\Auth::user()]);
    }
    public function uploadProfile () {
        return view("users/uploadProfile");
    }
    public function editProfile(){
        \request()->validate([
            "profile"=>"required|file|mimes:jpg,png|max:2048"
        ]);
        $profile = \request()->file("profile")->getClientOriginalName();
        $profile.=time();
        \request()->file("profile")->storeAs("public/profiles",$profile);
        \Auth::user()->profile = $profile;
        \Auth::user()->save();
        return redirect("/users/info");
    }
}
