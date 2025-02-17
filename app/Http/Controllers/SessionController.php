<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class SessionController extends Controller
{


    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {

        $request->authenticated();


        request()->session()->regenerate();
        Session::put([
            'gym_id' => Auth::user()->gym->id,
            'email' => Auth::user()->email,
            'gymName' => Auth::user()->gym->gymName,
            'userName' => Auth::user()->name
        ]);

        return redirect()->intended('/admin');
    }



    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
