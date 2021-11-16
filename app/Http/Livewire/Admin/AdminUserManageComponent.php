<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Auth;
use Hash;

class AdminUserManageComponent extends Component
{
    public $user_id;

    public $newpasswd;
    public $password_confirmation;

    public function mount($user_id){
        $user = User::find($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->user_type;
        $this->user_id = $user->id;

    }

    public function updateUserAccount(){
        if(Auth::user()->user_type == 'ADM'){
            //dd(Auth::user()->user_type);
            $user = User::find($this->user_id);
            //dd($user->name);
            if($this->role != "" || $this->role != null ){
                $user->user_type = $this->role;
                $user->save();
                session()->flash('smessage', 'User role updated successfully');
            }

            if($this->newpasswd != "" || $this->newpasswd != null ){
                if ($this->password_confirmation === $this->newpasswd) {
                    $user->password = Hash::make($this->newpasswd);
                    $user->save();
                    session()->flash('smessage', 'Password has been changed successfully ');
                }
                else{
                    session()->flash('message', 'Failed!! Check the field is empty or password does not match');
                }
            }
        }
        else{
            session()->flash('message', "You don't have permission to do this action !!");
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-user-manage-component')->layout('layouts.adminbase');
    }
}
