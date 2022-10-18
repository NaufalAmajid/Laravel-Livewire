<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as UserModel;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $updateMode = false;
    public $sort = 'asc', $sortBy = 'name', $perPage = 5, $search = '';

    protected $listeners = [
        'userStore' => 'handleUserStore',
        'userUpdate' => 'handleUserUpdate',
    ];

    public function render()
    {
        $users = UserModel::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sort)
            ->paginate($this->perPage);

        return view('livewire.user', compact('users'));
    }

    public function getUser($id)
    {
        $this->updateMode = true;
        $user = UserModel::findOrFail($id);
        $this->emit('getUser', $user);
    }

    public function destroy($id)
    {
        if($id){
            $user = UserModel::findOrfail($id);
            $user->delete();
            session()->flash('message', [
                'type' => 'danger',
                'message' => 'User successfully deleted.'
            ]);
        }
    }

    public function handleUserStore($user)
    {
        session()->flash('message', [
            'type' => 'success',
            'message' => 'User '. $user['name'] .' successfully created.'
        ]);

    }

    public function handleUserUpdate($user)
    {
        session()->flash('message', [
            'type' => 'warning',
            'message' => 'User '. $user['name'] .' successfully updated.'
        ]);

        $this->updateMode = false;

    }

}
