<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class RegistrationPlanDate extends Component
{
    public $date;
    public $currentDate;


    public $selectedPlanId;
    public $selectetIndex = 0;
    public $plans = [];

    public $planDuration;
    public $planPrice;
    protected $casts = [
        'date' => 'date:Y-m-d',
        'currentDate' => 'date:Y-m-d',
    ];

    public function mount()
    {

        $this->selectedPlanId = $this->plans[$this->selectetIndex]['id'] ?? null;
        $this->planDuration = $this->plans[$this->selectetIndex]['duration_in_days'] ?? null;
        $this->planPrice = $this->plans[$this->selectetIndex]['price'] ?? 0;
        $selectedPlan = collect($this->plans)->firstWhere('id', '=', $this->selectedPlanId);
        $this->date = now()->toDateString();
        $this->currentDate = now()->addDays($selectedPlan['duration_in_days'] ?? 0)->toDateString();
    }

    public function updated($property)
    {
        if (!in_array($property, ['selectedPlanId', 'date'])) {
            return;
        }

        $this->selectetIndex = collect($this->plans)->search(fn($plan) => $plan['id'] == $this->selectedPlanId);
        if ($this->selectetIndex === false) {
            return;
        }

        $selectedPlan = $this->plans[$this->selectetIndex] ?? null;
        $this->planDuration = $selectedPlan['duration_in_days'] ?? 0;
        $this->planPrice = $selectedPlan['price'] ?? 0;
        $this->currentDate = Carbon::createFromFormat('Y-m-d', $this->date)
            ->addDays($this->planDuration)
            ->toDateString();
    }

    public function render()
    {
        return view('livewire.registration-plan-date');
    }
}
