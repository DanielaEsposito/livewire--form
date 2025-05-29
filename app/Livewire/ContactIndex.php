<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    public $searchName = '';
    public $searchEmail = '';
    public $searchPhone = '';
    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        session()->flash('message', 'Contact deleted successfully.');
    }

    public function render()
    {
        //$query=Contact::where(...) così sovrascrivi la query e non funziona il filtro perchè riparte da 0 
        $query = Contact::query();
        if ($this->searchName) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        }
        if ($this->searchEmail) {
            $query->where('email', 'like', '%' . $this->searchEmail . '%');
        }
        if ($this->searchPhone) {
            $query->where('phone', 'like', '%' . $this->searchPhone . '%');
        }
        $contacts = $query->get();

        return view('livewire.contact-index', compact('contacts'));
    }
}
