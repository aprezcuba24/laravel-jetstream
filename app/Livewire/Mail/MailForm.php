<?php

namespace App\Livewire\Mail;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class MailForm extends Form
{
    #[Validate('required|min:3')]
    public $subject = '';
 
    #[Validate('required|min:3')]
    public $body = '';
 
    #[Validate('required|email')]
    public $to = '';
}
