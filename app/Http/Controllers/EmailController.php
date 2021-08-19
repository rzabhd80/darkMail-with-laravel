<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sentBox () {
        $email = User::where("id",\Auth::user()->id);
    }
}
