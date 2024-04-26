<?php

namespace App\Livewire\Business;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;

class Select extends Component
{
    public  $showSelection= false;
    public $businessId;
    public $showButton = false;

    public function mount(Request $request){

        if ($request->selectBusiness == 'true'){
            $this->showSelection  = true;
        }
    }

    public function updateBusinessId(Request $request)
    {
        $request->session()->put('businessId', $this->businessId);
        $this->redirect('/dashboard');
    }

    public function change()
    {
        $this->showSelection  = true;
    }
    public function render()
    {
        return view('livewire.business.select');
    }
}
