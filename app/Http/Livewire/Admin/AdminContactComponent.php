<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use Str;

class AdminContactComponent extends Component
{
    public function deleteComment($comment_id){
        $comment = Contact::find($comment_id);
        $comment->delete();
        session()->flash('message','This Contact Message deleted Successfully');
    }

    public function deleteAllComment(){
        Contact::whereNotNull('id')->delete();
        session()->flash('message','All Contact Messages deleted Successfully');
    }

    public function render()
    {
        $contacts = Contact::paginate(12);
        return view('livewire.admin.admin-contact-component',compact('contacts'))->layout('layouts.adminbase');
    }
}
