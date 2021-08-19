<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sentBox()
    {
        $emails = Email::where("sender_id",\Auth::user()->id)->get();
        return view("emails/index", ["emails" => $emails]);
    }
}
