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
        $profileData = explode(".",$profile);
        $profileData[0].=time();
        $profile = $profileData[0].".".$profileData[1];
        \request()->file("profile")->storeAs("profiles",$profile);
//        \request()->file("profile")->storeAs("")
        //or
        //\Storage::disk("public")->put();
        \Auth::user()->profile = $profile;
        \Auth::user()->save();
        return redirect("/users/info");
    }
}
