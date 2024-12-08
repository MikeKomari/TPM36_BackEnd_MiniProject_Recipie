<?php

namespace App\Http\Controllers;

use App\Mail\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function sendEmail($email){
        Mail::to($email)->send(new UserEmail());
        return redirect('/');
    }
}
