<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as UserModel;

class UserUpdate extends Component
{
    public $user_id, $name, $email, $gender, $address;

    protected $listeners = [
        'getUser' => 'showUser'
    ];

    public function render()
    {
        return view('livewire.user-update');
    }

    public function showUser($user)
    {
        $this->user_id = $user['id'];
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->gender = $user['gender'];
        $this->address = $user['address'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5|max:50|string',
            'email' => 'required|email|unique:users,email,'.$this->user_id.',id',
            'gender' => 'required',
            'address' => 'required|min:5|max:100|string',
        ]);

        if ($this->user_id) {
            $user = UserModel::findOrFail($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'gender' => $this->gender,
                'address' => $this->address
            ]);

            $this->resetInput();

            $this->emit('userUpdate', $user);
        }

    }

    private function resetInput(){
        $this->name = null;
        $this->email = null;
        $this->gender = null;
        $this->address = null;
    }
}
