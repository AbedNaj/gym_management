<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LoadUserGym
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            $user = Auth::user();

            // Load gym relation only once
            if (!$user->relationLoaded('gym')) {
                $user->load('gym');
            }

            // Store gym_id in session
            if ($user->gym) {
                Session::put('gym_id',   $user->gym->id);
            }
        }

        return $next($request);
    }
}
