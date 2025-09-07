<?php

namespace App\Livewire\Mail;

use App\Jobs\ProcessMail;
use App\Models\Mail;
use Livewire\Component;

class CreateMail extends Component
{
    public MailForm $form;

    public function save()
    {
        $this->form->validate();
        $mail = Mail::create(
            [
                ...$this->form->all(),
                "user_id" => auth()->id(),
            ]
        );
        ProcessMail::dispatch($mail);
        session()->flash('message', 'Mail sent successfully!');
        $this->redirect(route('mails'), navigate: true);
    }

    public function render()
    {
        return view('livewire.mail.mail-form');
    }
}
