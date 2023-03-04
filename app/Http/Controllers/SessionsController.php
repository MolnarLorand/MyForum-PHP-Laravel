<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function store()
    {
        //validate request
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //auth user based on form data
        if (!auth()->attempt($attributes)) {
            //if auth failed
            throw ValidationException::withMessages([
                'email' => 'Your credentials could not be verified.'
            ]);
        }

        session()->regenerate(); //session fixation !

        //redirect with success flash message
        return redirect('/')->with('success', "Successfully logged in");//if everything is ok


        //or I can do it like this
        /*        return back()
                    ->withInput()
                    ->withErrors(['email'=>'Your credentials could not be verified.']);*/
    }

    protected function create()
    {
        return view('sessions.create');
    }
}
