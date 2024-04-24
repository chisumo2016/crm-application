<?php

namespace App\Livewire\Business;

use App\Mail\InviteUser;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Invite extends Component
{
    use LivewireAlert;

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

        $this->alert('success', 'Invite mail send successfully',[
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressbar' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.business.invite');
    }
}
