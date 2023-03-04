<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store()
    {
        //create user
        $attributes = request()->validate([
            'name'=>['required','max:255'],
            'username'=>['required','max:255','min:3','unique:users,username'],    //or Rule::unique['users','username']
            'email'=>['required','email', 'unique:users,email'],
            'password'=>['required','max:255','min:5'],
        ]);

/*        $attributes['password'] = bcrypt($attributes['password']);*/

        //eloquent mutator -> in user class setPasswordAttribute !
        $user = User::create($attributes);

        auth()->login($user);

/*        session()->flash('success','Your account has been created successfully!');*/
        return redirect('/')->with('success','Your account has been created successfully!');;
    }
}
