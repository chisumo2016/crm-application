<?php

namespace App\Livewire\Business;

use Livewire\Attributes\On;
use Livewire\Component;

class Register extends Component
{
    public  $showForm = false;
    public  $planSelected;


    #[On('plan-selected')]
    public function planSelected($plan)
    {
        //dd($plan);
        $this->showForm = true;
        $this->selectedPlan = $plan;

    }

    public function render()
    {
        return view('livewire.business.register');
    }
}
