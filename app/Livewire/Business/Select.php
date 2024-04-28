<?php

namespace App\Livewire\Business;

use App\Models\Business;
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
        /**Server Validation**/
        $businesses = Auth::user()->businesses;
        //dd($businesses->toArray());

        $exists = false;
        foreach ($businesses as $business){
            if ($business->id == $this->businessId){
                $exists = true;
            }
        }
        if ($exists){
            $request->session()->put('businessId', $this->businessId);
            $business = Business::find($this->businessId);
            $request->session()->put('businessName', $business->name);
            $this->redirect('/dashboard');
        }else{
            abort(403, 'Unauthorized action.');
        }


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
