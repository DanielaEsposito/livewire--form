<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        session()->flash('message', 'Contact deleted successfully.');
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => Contact::all()
        ]);
    }
}
