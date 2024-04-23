<?php

namespace App\Livewire\Business;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;

class Register extends Component
{
    use PasswordValidationRules;


    public  $plans;
    public  $showForm = false;
    public  $selectedPlan = [];
    public $currentStep = 1;
    public $business = []; //name and industry
    public $user = []; //name and industry


    public function mount(){
        $this->plans = Plan::all();
    }
    #[On('plan-selected')]
    public function planSelected($plan)
    {
        //dd($plan);
        $this->showForm = true;
        $this->selectedPlan = $plan;
        $this->currentStep = 2;

    }

    public function nextStep($step)
    {
        //dd($step);
        if ($step == 3){
            $validatedBusiness = $this->validate([
                'business.name' => 'required',
                'business.industry' => 'required',
            ]);


        }elseif ($step == 'submit'){

            $validatedUsers = $this->validate([
                'user.name' => ['required', 'string', 'max:255'],
                'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                //'user.password' => $this->passwordRules(),
                'user.password' => 'required|string|min:8|max:60|confirmed',
            ]);

           // dd('ss');

        }

        $this->currentStep = intval($step);
    }

    public function render()
    {
        return view('livewire.business.register');
    }
}
