<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    public $search = '';
    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        session()->flash('message', 'Contact deleted successfully.');
    }

    public function render()
    {
        if ($this->search) {
            $contacts = Contact::where('name', 'like', '%' . $this->search . '%')->get();
        } else {
            $contacts = Contact::all();
        }

        return view('livewire.contact-index', compact('contacts'));
    }
}
