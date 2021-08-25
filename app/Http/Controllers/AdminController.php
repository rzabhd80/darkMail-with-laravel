<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Email;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view("admins.register");
    }

    public function save()
    {
        \request()->validate([
            "name" => "string|required",
            "lastname" => "string|required",
            "email" => "unique:admins,email",
            "backupEmail" => "email|required",
            "password" => "required|confirmed|min:8"
        ]);
        $admin = new Admin();
        $admin->name = \request("name");
        $admin->lastname = \request("lastname");
        $admin->email = \request("email")."@darkMail.com";
        $admin->backupEmail = \request("backupEmail");
        $admin->password = \Hash::make(\request("password"));
        $admin->save();
        \Auth::guard("admin")->login($admin);
        return redirect("/");
    }

    public function loginForm()
    {
        return view("admins.login");
    }

    public function login()
    {
        \request()->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);
         $admin = Admin::where("email", \request("email"))->first();
        if ($admin == null)
            return back()->withErrors(["email"=>"admin not found"]);
        if (\Hash::check(\request("password"), $admin->password)) {
            \Auth::guard("admin")->login($admin);
            return redirect("/");
        } else return back()->withErrors(["password"=>"password doesnt match"]);
    }
    public function logout () {
        \Auth::guard("admin")->logout();
    }

    public function detail() {
        $admin = \Auth::guard("admin")->user();
        return view("admins.details",["admin"=>$admin]);
    }
    public function setProfile(){
        return view("admins.profile");
    }
    public function uploadProfile (){
        \request()->validate([
            "profile"=>"required|file|mimes:jpg,png"
        ]);
        $file = \request()->file("profile")->getClientOriginalName();
        $file_data = explode(".",$file);
        $file_data[0].=time();
        $file = $file_data[0].".".$file_data[1];
        \Auth::guard("admin")->user()->profile = $file;
        \Auth::guard("admin")->user()->save();
        \request()->file("profile")->storeAs("public/profiles",$file);
        return redirect(route("adminsDetail"));
    }
//    public function download () {
//        $file = \Storage::disk("public")->get("profiles/photo_2021-08-21_18-09-051629553212.jpg");
//        return response()->file($file);
//    }
}
