<?php

namespace App\Livewire\Business;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Business;
use App\Models\Plan;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;


class Register extends Component
{
    use PasswordValidationRules;
    use UsesSpamProtection;


    public  $plans;
    public  $showForm = false;
    public  $selectedPlan = [];
    public $currentStep = 1;
    public $business = []; //name and industry
    public $user = []; //name and industry

    public HoneypotData $extraFields;


    public function mount(){
        $this->extraFields = new HoneypotData();
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
            $this->protectAgainstSpam(); // if is spam, will abort the request
            //dd($this->selectedPlan['trial_period_days']);

            $validatedBusiness = $this->validate([
                'business.name' => 'required',
                'business.industry' => 'required',
            ]);

            $validatedUser = $this->validate([
                'user.name' => ['required', 'string', 'max:255'],
                'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                //'user.password' => $this->passwordRules(),
                'user.password' => 'required|string|min:8|max:60|confirmed',
            ]);
                //dd($validatedUser);
            // Create a DateTime object for the current date and time
            $currentDateTime = new DateTime();

            // Add 15 days to the current date and time
             //$currentDateTime->add(new DateInterval('P15D'));
                $currentDateTime->modify('+'.$this->selectedPlan['trial_period_days'].'days');

            // Format the resulting date and time as a string
              $result = $currentDateTime->format('Y-m-d H:i:s');

             $businessData  =[
                'name'      => $this->business['name'],
                'industry'  => $this->business['industry'],
                'plan_id'    => $this->selectedPlan['id'],
                'expire_at'  => $result
            ];

            $business = Business::create($businessData);

            $hashedPassword = Hash::make($validatedUser['user']['password']);
            $user  = User::create([
                'name' => $validatedUser['user']['name'],
                'email' => $validatedUser['user']['email'],
                'password' => $hashedPassword,
            ]);

            // Attach the user to the business
            $user->businesses()->attach($business->id);

            $this->redirectRoute('login');

           // dd('ss');

        }

        $this->currentStep = intval($step);
    }

    public function render()
    {
        return view('livewire.business.register');
    }
}
