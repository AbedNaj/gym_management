<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\password;

class RegisterUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $UserAttr = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed ', password::defaults()],
        ]);

        $GymAttr = $request->validate([
            'gymName' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'location' => ['required', 'string'],

        ]);

        $user =  User::create($UserAttr);

        $user->gym()->create($GymAttr);
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
