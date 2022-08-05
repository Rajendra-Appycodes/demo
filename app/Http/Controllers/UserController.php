<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        // dd($request);
        $registerFormValidate=$request->validate([
            'name'  => 'required|min:3',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/(91)[0-9]{10}/',
            'password' => 'required|confirmed|min:6'
        ]);
        $registerFormValidate['password']=bcrypt($registerFormValidate['password']);
        $user = User::create($registerFormValidate);
        auth()->login($user);
        Session :: flash('success','User created and logged in');
        return redirect('/');   
    }

    public function logout(Request $request){
        // dd($request) ;
        auth()->logout();
        $request->session()-> invalidate();
        $request->session()-> regenerateToken();
        Session :: flash('success','You are now logged out!');
        return redirect()->route('home-page');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $loginFormValidate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(auth()->attempt($loginFormValidate)){
            $request->session()->regenerate();
            Session :: flash('success','You are now logged in!');
            return redirect()->route('home-page');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
