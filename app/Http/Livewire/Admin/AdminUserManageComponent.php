<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Auth;

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
            if($this->newpasswd != "" || $this->newpasswd != null){
                dd($this->newpasswd);
            }
            dd("Blank");
            $user->password = $this->newpasswd;
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('message', 'Password has been changed successfully ');
            return redirect('/');
        }
        else{
            session()->flash('message', 'Password does not match');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-user-manage-component')->layout('layouts.adminbase');
    }
}
