<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Events\catatDataLogout;

class LogoutController extends Controller
{
    public function logout(Request $request){
        $user = Auth::user();
        if($user){
            event(new catatDataLogout($user->userID));
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect('/login');
    }
}
