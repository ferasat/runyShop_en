<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function myAcount()
    {
        $user_id = Auth::id();

        $dropzone = true;
        $titlePage = 'حساب کاربری';
        $XEditable = true ;

        if (Auth::user()->status == 'deActive'){
            return view('user.profile.newProfile' , compact('titlePage', 'dropzone'));
        }
        return view('user.profile.index' , compact('profile', 'titlePage','XEditable'));
    }
}
