<?php

namespace App\Livewire;

use App\Models\Plan;
use Livewire\Component;

class PlansPricing extends Component
{
    public  $plans;
    public $selectedPlan;

    public function mount(){
        $this->plans = Plan::all();
    }

    public function selectPlan(Plan $plan)
    {
      //dd($planId);
      $this->selectedPlan = $plan;
    }

    public function render()
    {

        return view('livewire.plans-pricing');
    }
}
