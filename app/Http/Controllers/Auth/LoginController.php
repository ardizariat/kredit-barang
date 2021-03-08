<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function authenticated(Request $request, $user)
    {
        if($user->hasRole('super-admin') ||$user->hasRole('admin')){
            return redirect()->route('admin.dashboard');
        }
        if($user->hasRole('pelanggan')){
            return redirect()->route('admin.transaksi.kredit');
        }
        // if(auth()->user()->status == 0){
        //     auth()->user()->logout();
        //     return redirect()->route('login')->with('gagal','Akun anda tidak aktif, silahkan hubungi admin untuk aktivasi');
        // }
        return redirect()->route('home');
    }

    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
