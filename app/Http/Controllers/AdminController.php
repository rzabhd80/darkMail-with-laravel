<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
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
}
