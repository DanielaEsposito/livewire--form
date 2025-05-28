<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactShow extends Component
{

    public function render($id)
    {
        return view('livewire.contact-show', ['contact' => Contact::findOrFile($id)]);
    }
}
