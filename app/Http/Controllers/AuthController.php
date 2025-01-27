<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister(){
        return view('register');
    }

    public function showLogIn(){
        return view('login');
    }


    public function register(Request $request){
        $registration = $request->validate([
            'name'=>['required','max:10'],
            'email'=>['required','email'],
            'password'=>['required','min:8','max:200']
        ]);


        $registration['password'] = bcrypt($registration['password']);
        $user = User::create($registration);
        Auth::login($user);

        return redirect('/');
    }

    public function logout(){
       Auth::logout();
        return redirect('/');
        
    }

    public function login(Request $request){
        $login = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (auth()->guard('web')->attempt(['email' => $login['email'],'password'=>$login['password']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }
}
