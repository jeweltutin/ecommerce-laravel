<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

class AdminContactDetailsComponent extends Component
{
    public $contact_id;

    public function mount($contact_id){
        $this->contact_id = $contact_id;
    } 

    public function render()
    {
        $contact = Contact::find($this->contact_id);
        return view('livewire.admin.admin-contact-details-component',compact('contact'))->layout('layouts.adminbase');
    }
}
