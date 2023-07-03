<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return view('form');
    }

    public function register(Request $request){
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required | email',
                'password' => 'required',
                'cpassword' => 'required | same:password',
            ]
        );
        print("<pre>");
        print_r($request -> all());
        print("</pre>");
    }
}
