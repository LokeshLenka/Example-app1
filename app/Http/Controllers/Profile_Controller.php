<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile_Controller extends Controller
{

    public function show(){
        return view('users.showuser');
    }
}
