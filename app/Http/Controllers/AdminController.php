<?php

namespace App\Http\Controllers;

use App\Charts\monthlyChart;
use App\Charts\monthlyGrowth;
use App\Models\debts;
use App\Models\registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monthlyChart = new monthlyChart();

        $subscriptionStats = Registration::selectRaw("
            COUNT(CASE WHEN status = 'active' THEN 1 END) AS activeSubs,
            COUNT(CASE WHEN status = 'expired' AND DATE(end_date) = ? THEN 1 END) AS expiringToday,
            COUNT(CASE WHEN status = 'expired' THEN 1 END) AS expiringTotal,
            COUNT(id) AS totalSubs", [Carbon::yesterday()])
            ->where('gym_id', Session::get('gym_id'))
            ->first();

        $debtStats = debts::selectRaw("
            SUM(debt_amount) AS debtSum,
            SUM(paid_amount) AS payedSum")->where('gym_id', Session::get('gym_id'))
            ->first();
        return view(
            'admin.index',
            [
                'activeSubs' => $subscriptionStats->activeSubs,
                'expringToday' => $subscriptionStats->expiringToday,
                'expringTotal' => $subscriptionStats->expiringTotal,
                'totalSubs' => $subscriptionStats->totalSubs,
                'debtSum' => $debtStats->debtSum ?? 0,
                'payedSum' => $debtStats->payedSum ?? 0,
                'monthlyChart' => $monthlyChart,

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $type) {}

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
    public function destroy(string $id)
    {
        //
    }
}
