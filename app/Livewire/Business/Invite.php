<?php

namespace App\Livewire\Business;

use App\Mail\InviteUser;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
class Invite extends Component
{

    public  $inviteModal = false;
    public  $email;

    public function invite()
    {
        $this->inviteModal = true;
    }

    public function sendInvite()
    {
        $this->validate([
            'email' => 'required|email'
        ]);

        Mail::to($this->email)->send(new InviteUser());
        $this->inviteModal = false;
    }

    public function render()
    {
        return view('livewire.business.invite');
    }
}
