<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Auth;

class AdminUserComponent extends Component
{
    public function deleteUser($user_id){
        $user = User::find($user_id);
        //$current_user = Auth::user()->name;
        $current_user_id = Auth::id();
        if ($current_user_id !== $user_id) {
            $user->delete();
            session()->flash('smessage','User has been deleted Successfully');
        }
        else{
            session()->flash('message','You are the Current User');
        }
        
    }

    public function render()
    {
        $users = User::paginate(12);
        return view('livewire.admin.admin-user-component',compact('users'))->layout('layouts.adminbase');
    }
}
