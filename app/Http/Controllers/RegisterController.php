<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
     return view('register.create');   
    }

    public function store()
    {
        var_dump(request()->all());
        // request()->validate({
        //     'name' => 'required',
        //     'username' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:7|max:255',
        // });
    }
}
