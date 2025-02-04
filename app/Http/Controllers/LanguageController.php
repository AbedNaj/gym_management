<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{

    public function __invoke(Request $request, $lang)
    {
        $minutes = 60 * 24 * 30;
        Cookie::queue('locale', $lang, $minutes);

        return redirect()->back();
    }
}
