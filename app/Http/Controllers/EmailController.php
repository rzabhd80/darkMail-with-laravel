<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use const http\Client\Curl\AUTH_ANY;

class EmailController extends Controller
{
    public function sentBox()
    {
        $emails = Email::where("sender_id", \Auth::user()->id)->get();
        return view("emails.box", ["emails" => $emails]);
    }

    public function inbox()
    {
        $emails = Email::where("rec_id", \Auth::user()->id)->get();
        return view("emails.box", ["emails" => $emails]);
    }

    public function create()
    {
        return view("emails.create");
    }

    public function save()
    {
        \request()->validate([
            "title" => "required",
            "text" => "required",
            "receiver" => "required",
        ]);
        $email = new Email();
        $email->title = \request("title");
        $email->text = \request("text");
        $rec = User::where("email", \request("receiver"))->firstOrFail();
        $email->rec_id = $rec->id;
        $email->sender_id = \Auth::user()->id;
        $email->save();
        return redirect("/emails/sentBox");
    }

    public function detail($id)
    {
        $email = Email::find($id);
        $email_sender = User::find($email->sender_id);
        $email_rec = User::find($email->rec_id);
        return view("emails.detail", ["email" => $email, "email_sender" => $email_sender, "email_rec" => $email_rec]);
    }

    public function delete($id)
    {
        $email = Email::find($id);
        $email->deleted = true;
        $email->save();
        return back();
    }

    public function star($id)
    {
        $email = Email::find($id);
        $email->starred = true;
        $email->save();
    }

    public function starredBox()
    {
        $emails = Email::where("sender_id", \Auth::user()->id)->orWhere("rec_id", \Auth::user()->id)->get();
        $emails = $emails->filter(function ($v) {
            return $v->starred;
        });
        return view("emails.box", ["emails" => $emails]);
    }

    public function deletedBox()
    {
        $emails = Email::where("sender_id", \Auth::user()->email)->orWhere("rec_id", \Auth::user()->id)->filter(function ($v) {
            return $v->deleted;
        });
        return view("emails.box",["emails"=>$emails]);
    }
}
