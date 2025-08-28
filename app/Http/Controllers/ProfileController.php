<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Models\User;


class ProfileController extends Controller
{
    public function editPicture()
    {
        $user = Auth::user();
        return view('profile.picture', compact('user'));
    }

    public function updatePicture(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            
        ]);

        if(!File::exists($uploadPath)){
            File::makeDirectory( $uploadPath , 0777, true, true);
        }

        if($user->profile_picture && File::exists(public_path($user->profile_picture))){
            File::delete(public_path($user->profile_picture));
        }
        
        $filename = uniqid().'_'.time().'.'.$request->profile_picture->extension();//generate unique FILE NAME
        
           // Save path in user model
        $user->profile_picture = 'uploads/profile_pictures/'.$filename;
        $user->save();
         return redirect()->back()->with('success', 'Profile picture updated successfully!');
        
    }
    
}