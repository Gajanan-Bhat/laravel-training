<?php

namespace App\Http\Controllers;
use App\Models\User;
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
        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:7',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        User::create($attributes);  

        session()->flash('success', 'Your account has been created.');
        return redirect('/');
    }
}
