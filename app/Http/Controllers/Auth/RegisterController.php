<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request){ //validating data 
        $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'dob' => 'required|date|before:today',
            'gender' => ['required', Rule::in(['male', 'female'])],
        ]);
        

        try{

             $user = User::create([
            'fname' =>$request->fname,
            'lname' =>$request->lname,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'gender' =>$request->gender,
           
        ]);
        //  dd($user);
         auth()->login($user);
      
            return redirect()->route('login')->with('success', "Registration successful!");

            
        }catch(Exception $e){
            return $e->getMessage();
           
        } 
    }
}