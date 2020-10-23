<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class LoginController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('users');
        }else{ return redirect()->route('get-login'); }
    }

    public function postLogin(Request $request)
    {
//        dd($request);
        $data = $request->only('email', 'password');
//        dd($data);
//        dd(Auth::attempt($data));
        if (Auth::attempt($data)) {
//            dd(Auth::User()->id);
            return redirect()->route('users.show', Auth::User()->id);
        } else {
            return redirect()->route('get-login');
        }
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('get-login');
    }

    public function register(){
        return view('getRegister');
    }
}
