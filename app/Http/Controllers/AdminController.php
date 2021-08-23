<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Email;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function save()
    {
        \request()->validate([
            "name" => "string|required",
            "lastname" => "string|required",
            "email" => "email|unique:admins,email",
            "backupEmail" => "email|required",
            "password" => "required|confirmed|min:8"
        ]);
        $admin = new Admin();
        $admin->name = \request("name");
        $admin->lastname = \request("lastname");
        $admin->email = \request("email");
        $admin->email = \request("email");
        $admin->password = \Hash::make(\request("password"));
        $admin->save();
        \Auth::guard("admin")->login($admin);
        return redirect("/");
    }

    public function loginForm()
    {
        return view("auth.login");
    }

    public function login()
    {
        $admin = Admin::where("email", \request("email"))->first();
        if ($admin == null)
            return back()->withErrors("user not found");
        if (\Hash::check(\request("password"), $admin->password)) {
            \Auth::guard("admin")->login($admin);
            return redirect("/");
        } else return back()->withErrors("no matching admin");
    }
    public function logout () {
        \Auth::guard("admin")->logout();
    }
}
