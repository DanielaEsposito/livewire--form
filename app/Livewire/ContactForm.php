<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;


class ContactForm extends Component
{
    public $contactId;
    public $name;
    public $email;
    public $phone;
    // il metodo mount viene utilizzato per inizializzare i dati del componente
    // quando viene caricato. In questo caso, se viene passato un ID, il componente
    // carica i dati del contatto corrispondente e li assegna alle proprietà del componente.
    // i dati vengono passati tramite l'URL, quindi il metodo mount viene chiamato automaticamente
    //     quando il componente viene caricato con un ID specifico.
    //con questo metodo riporto i dati già presenti del contatto negli input per fare successivamnete la modifica 
    public function mount($id = null)
    {
        if ($id) {
            //definisco la variabile contatto e  assegno alle variabili pubbliche il valore già esistente del contantto 
            $contact = Contact::findOrFail($id);
            $this->contactId = $contact->id;
            $this->name = $contact->name;
            $this->email = $contact->email;
            $this->phone = $contact->phone;
        }
    }

    public function save()
    {
        // Validazione dei dati del modulo
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
        ]);
        // Se l'ID del contatto è presente, aggiorna il contatto esistente,
        // altrimenti crea un nuovo contatto.
        if ($this->contactId) {
            Contact::find($this->contactId)->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
            session()->flash('message', 'Contatto aggiornato!');
        } else {
            Contact::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
            session()->flash('message', 'Contatto creato!');
        }

        $this->reset(['name', 'email', 'phone', 'contactId']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
