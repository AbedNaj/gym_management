<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $atrr = $request->validate(
            [
                'email' => ['required', 'email'],
                'password'  => ['required', 'string'],
            ]
        );
        if (!Auth::attempt($atrr)) {
            throw ValidationException::withMessages(['password' => 'Sorry , those condetinals do not match']);
        }
        request()->session()->regenerate();
        Session::put([
            'gym_id' => Auth::user()->gym->id,
            'email' => Auth::user()->email,
            'gymName' => Auth::user()->gym->gymName,
            'userName' => Auth::user()->name
        ]);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        Session::forget([
            'gym_id',
            'email',
            'gymName',
            'userName'
        ]);
        Session::regenerate();
        Session::regenerateToken();

        return redirect('/');
    }
}
