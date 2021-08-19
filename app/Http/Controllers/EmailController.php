<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sentBox()
    {
        return view("emails/sentBox", ["emails" => $emails]);
    }
    public function inbox () {
        $emails = Email::where("rec_id",\Auth::user()->id)->get();
        return view("emails.inbox");
    }
}
