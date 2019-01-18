<?php

namespace App\Http\Controllers;

use App\Mail\SendContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUS()
    {
        return view('contactUS');
    }

    /** * Show the application dashboard.
     * * * @return \Illuminate\Http\Response
     */
    public function contactPost(Request $request)
    {

if(!isset($request)){

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message')
        ];

        Mail::to("ashot.gharakeshishyan@esterox.am")->send(new SendContactMail($data));

        return redirect()->back();
}else{
    return redirect()->back();
}
    }
}