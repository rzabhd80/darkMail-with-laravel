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
        $emails = $emails->filter(function ($v) {
            return !$v->deleted && !$v->draft;
        });
        return view("emails.box", ["emails" => $emails]);
    }

    public function inbox()
    {
        $emails = Email::where("rec_id", \Auth::user()->id)->get();
        $emails = $emails->filter(function ($v) {
            return !$v->deleted;
        });
        return view("emails.box", ["emails" => $emails]);
    }

    public function create()
    {
        return view("emails.create");
    }

    public function respond($id)
    {
        $email = Email::findOrFail($id);
        $user = User::findOrFail($email->sender_id);
        return view("emails.reply", ["user" => $user]);

    }

    public function save()
    {
        \request()->validate([
            "title" => "required",
            "text" => "required",
            "receiver" => "required",
            "draft" => "nullable",
            "attach.*" => "nullable|max:1999|mimes:jpg,pdf,png|file"
        ]);
        if (\request()->hasFile("attach")) {
            $fileName = \request()->file("attach")->getClientOriginalName();
            $fileInfo = explode(".", $fileName);
            $fileInfo[0] .= time();
            $fileName = $fileInfo[0] . "." . $fileInfo[1];
            \request()->file("attach")->storeAs("public/attaches", $fileName);
        } else {
            $fileName = null;
        }
        $email = new Email();
        $email->title = \request("title");
        $email->text = \request("text");
        $rec = User::where("email", \request("receiver"))->firstOrFail();
        $email->rec_id = \request("receiver");
        $email->sender_id = \Auth::user()->id;
        $email->attach = $fileName;
        if (\request()->has("draft"))
            $email->draft = true;
        $email->save();
        return redirect("/emails/sentBox");
    }

    public function saveDraft()
    {
        \request()->validate([
            "title" => "required|max:200",
            "text" => "required|max:500",
            "receiver" => "required|exists:users,email",
            "attach" => "nullable|mimes:jpg,pdf,jpg|file"
        ]);
        $email = new Email();
        $email->title = \request("title");
        $email->text = \request("text");
        $email->sender_id = \Auth::user()->id;
        $email->rec_id = User::where("email", \request("receiver"))->first()->id;
        $email->draft = true;
        if (\request()->hasFile("attach")) {
            $name = basename(\request()->file("attach"));
            $file_info = explode(".", $name);
            $file_info[0] .= time();
            $file = $file_info[0] . $file_info[1];
            \request()->file("attach")->storeAs("public/attaches", $file);
            return redirect("/emails/draftBox");
        }
        $email->save();
        return redirect("/emails/draft");
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
        if ($email->starred == false)
            $email->starred = true;
        else $email->starred = false;
        $email->save();
        return redirect("/emails/starBox");
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
        $emails = Email::where("sender_id", auth()->user()->id)->orWhere("rec_id", auth()->user()->id)->get();
        $emails = $emails->filter(function ($v) {
            return $v->deleted;
        });
        return view("emails.box", ["emails" => $emails]);
    }

    public function draftBox()
    {
        $emails = Email::where("sender_id", \Auth::user()->id)->get();
        $emails = $emails->filter(function ($v) {
            return $v->draft;
        });
        return view("emails.box", ["emails" => $emails]);
    }
}
