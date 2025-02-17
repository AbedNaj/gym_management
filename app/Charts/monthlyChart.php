<?php

namespace App\Charts;

use App\Models\registration;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class MonthlyChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $months = registration::selectRaw('MONTH(start_date) AS month, COUNT(*) as count')
            ->where('gym_id', session('gym_id'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        $months->transform(function ($item) {
            $monthNumber = $item->month;
            $englishMonth = Carbon::create()->month($monthNumber)->format('F');
            $item->month = __('months.' . strtolower($englishMonth));
            return $item;
        });


        $this->labels($months->pluck('month')->toArray());


        $this->dataset(__('charts.monthly_registrations'), 'bar', $months->pluck('count')->toArray());
    }
}
