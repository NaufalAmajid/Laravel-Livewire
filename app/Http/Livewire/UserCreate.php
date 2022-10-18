<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as UserModel;

class UserCreate extends Component
{
    public $name, $email, $gender, $address;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5|max:50|string',
            'email' => 'required|email|unique:users|max:50',
            'gender' => 'required',
            'address' => 'required|min:5|max:100|string',
        ]);

        $user = UserModel::create([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'address' => $this->address,
        ]);

        $this->resetInput();

        $this->emit('userStore', $user);
    }

    private function resetInput(){
        $this->name = null;
        $this->email = null;
        $this->gender = null;
        $this->address = null;
    }

}
