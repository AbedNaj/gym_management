<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerSearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $query = $request->input('query');

        $customers = Customer::search($query)
            ->where('gym_id', session('gym_id'))
            ->take(20)
            ->get();

        return response()->json(['customers' => $customers]);
    }
}
