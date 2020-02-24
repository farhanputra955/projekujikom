<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendEmail;
use Illuminate\Support\Facades\Mail; 

class SendEmailController extends Controller
{
    public function email()
    {
        return view('kontak');
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  'required|email',
            'message'   =>  'required'
        ]);
    }
}
