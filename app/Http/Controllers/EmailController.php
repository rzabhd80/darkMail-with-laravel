<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sentBox()
    {
        $emails = \Auth::user()->sentBox();
        return view("emails/sentBox", ["emails" => $emails]);
    }
    public function inbox () {
        $emails = Email::where("rec_id",\Auth::user()->id)->get();
        return view("emails.inbox");
    }
    public function create(){
        return view("emails.create");
    }
    public function save () {
        \request()->validate([
            "title"=>"required",
            "text"=>"required",
            "receiver"=>"required",
        ]);
        $email = new Email();
        $email->title = \request("title");
        $email->text = \request("text");
        $rec = User::where("email",\request("receiver"))->firstOrFail();
        $email->rec_id = $rec->id;
        $email->sender_id = \Auth::user()->id;
        $email->save();
        return redirect("/emails/sentBox");
    }
}
