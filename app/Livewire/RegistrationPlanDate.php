<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class RegistrationPlanDate extends Component
{
    public $date;
    public $currentDate;
    public $changeDaysCount;

    public $selectedPlanId;
    public $selectetIndex = 0;
    public $plans = [];



    protected $casts = [
        'date' => 'date:Y-m-d',
        'currentDate' => 'date:Y-m-d',
    ];

    public function mount()
    {

        $this->selectedPlanId = $this->plans[$this->selectetIndex]['id'] ?? null;
        $selectedPlan = collect($this->plans)->firstWhere('id', '=', $this->selectedPlanId);
        $this->date = now()->toDateString();
        $this->currentDate = now()->addDays($selectedPlan['duration_in_days'] ?? 0)->toDateString();
    }


    public function selectetIndexChanged()
    {

        $this->selectetIndex = collect($this->plans)->search(fn($plan) => $plan['id'] == $this->selectedPlanId);

        // If plan exists, update related properties
        if ($this->selectetIndex !== false) {
            $selectedPlan = $this->plans[$this->selectetIndex];

            $selectedPlan = collect($this->plans)->firstWhere('id', '=', $this->selectedPlanId);

            $this->currentDate = Carbon::createFromFormat('Y-m-d', $this->date)
                ->addDays($selectedPlan['duration_in_days'] ?? 0)
                ->toDateString();
        }
    }
    public function currentDateChanged()
    {
        $this->selectedPlanId = $this->plans[$this->selectetIndex]['id'] ?? null;
        $selectedPlan = collect($this->plans)->firstWhere('id', '=', $this->selectedPlanId);

        $this->currentDate = Carbon::createFromFormat('Y-m-d', $this->date)
            ->addDays($selectedPlan['duration_in_days'] ?? 0)
            ->toDateString();
    }
    public function render()
    {
        return view('livewire.registration-plan-date');
    }
}
