<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //loginform
    public function login(){
        $this->data['title'] = "Please Login";
        return view('login.form', $this->data);
    }

    //confirmData
   public function authenticate(loginRequest $request)
   {
        $data = $request->only('email', 'password');

        if(Auth::attempt($data)){
            return redirect()->intended('dashboard');
        }
        else{
            return redirect()->route('login')->withErrors('Invalid Email or Password');
        }
   }

   //logout
   public function logout(){
       Auth::logout();
       return redirect()->route('login');
   }
}
