<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm() {

        return view('auth.login');

    }


    public function login(Request $request)
    {
        try{

            $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            ]);

            if(Auth::attempt($credentials)){
                // dd($request->session()->generate());
                $request->session()->regenerate();
                return redirect()->route('feed.index');
            }

            return back()->withErrors([
            'email' => 'Invalid email or password.',
            ]);

        }catch(Exception $e){
            return $e->getMessage();
        }
        // dd($user);  
    }

    public function index(){
        // dd(Auth::check());
        if(Auth::check()){
            return view('feed.index');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        try{

            Auth::logout();//It destroy the session automatically
            return redirect()->route('login');

        }catch(Exception $e){
            return $e->getMessage();
        }
    }


}