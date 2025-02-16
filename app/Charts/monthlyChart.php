<?php

namespace App\Charts;

use App\Models\registration;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class monthlyChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $months = registration::selectRaw('
        MONTH(start_date) AS month , COUNT(*) as count')

            ->groupBy('month')
            ->orderBy('month')
            ->where('gym_id', session('gym_id'))

            ->get();

        $this->labels($months->pluck('month')->map(function ($month) {
            return Carbon::create()->month($month)->format('F');
        })->toArray());

        $this->dataset('month', 'bar', $months->pluck('count'));
    }
}
