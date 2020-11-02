<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nasimController extends Controller
{
    public function index(){
        return view('group.groups');
    }
}
