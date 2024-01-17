<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Events\catatDataLogin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->only('userID_email','password');
        $login = Auth::attempt(array('userID' => $input['userID_email'], 'password' => $input['password']));
        if(!$login){
            $login2 = Auth::attempt(array('email' => $input['userID_email'], 'password' => $input['password']));
            if($login2){
                $user = Auth::user();
                event(new catatDataLogin($user->userID));
                if($user->kategori == "Admin"){
                    return redirect()->route("adminHome");
                }elseif($user->kategori == "Karyawan"){
                    return redirect()->route('karyawanHome');
                }elseif(Auth::user()->kategori == "Super Admin"){
                    return redirect()->route('superAdminHome');
                }else{
                    return redirect()->route('home');
                }
            }else{
                return redirect()->route('login')
                    ->with('error','Maaf, Email dan/atau Password anda salah atau belum terdaftar.');
            }
        }elseif($login){
            event(new catatDataLogin($login));
            if(Auth::user()->kategori == "Admin"){
                return redirect()->route("adminHome");
            }elseif(Auth::user()->kategori == "Karyawan"){
                return redirect()->route('karyawanHome');
            }elseif(Auth::user()->kategori == "Super Admin"){
                return redirect()->route('superAdminHome');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Maaf, Email dan/atau Password anda salah atau belum terdaftar.');
        }
    }
}
