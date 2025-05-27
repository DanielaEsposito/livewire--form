<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    //proprietà pubbliche per il form
    public $contact;
    public $name;
    public $email;
    public $phone;
    public $contactId;
    //validazione dei dati in entrata
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:contacts,email',
        'phone' => 'nullable|string|max:20',
    ];
    public function getLastContact()
    {
        $this->contact = Contact::latest()->first();
    }
    public function create()
    {
        //con questo metodo richiamo la validazione dei dati 
        $this->validate();
        //creo un nuovo contatto con i dati inseriti nel form
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
        $this->getLastContact();
        $this->resetForm();
    }
    public function update($id)
    {
        $conatact = Contact::findOrFail($id);
        $this->validate();
        $this->name = $conatact->name;
        $this->email = $conatact->email;
        $this->phone = $conatact->phone;
    }
    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->contactId = null;
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
