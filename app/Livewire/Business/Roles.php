<?php

namespace App\Livewire\Business;

use App\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $name;
    //public $business_roles;
    public $editing  = false;

    /*public function mount()
    {
        $this->business_roles = Role::all();
    }*/

    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);

        if($this->editing){
            //dd($this->editing);
            $this->editing->update(['name' => $this->name]);
            $this->alert('success', 'Role has been updated  successfully',[
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressbar' => true,
            ]);
        }else{
            Role::create([
                'name' => $this->name ,'business_id' =>session('businessId'), //AppserviceProvider
            ]);
        }

        $this->alert('success', 'Role has been created successfully',[
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressbar' => true,
        ]);
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->name = $role->name;
        $this->editing  = $role;
    }

    public function update($id)
    {
        $role = Role::findOrFail($id);
        $role->update(['name' => $this->name]);
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        $this->business_roles = Role::all();
        $this->alert('success', 'Role has been deleted successfully',[
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressbar' => true,
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->editing = false;
        $this->business_roles = Role::all();
    }


    // #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.business.roles', [
            'business_roles' => Role::paginate(10),
        ]);

    }
}
