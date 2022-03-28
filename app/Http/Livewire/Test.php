<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Test extends Component
{
    protected $queryString = [
        'search' => ['as' => 's', 'except' => '']
    ];

    public $search;

    public function render()
    {


        return view('livewire.test', [
            'users' => User::query()->where('username', 'like', '%' . $this->search . '%')->get()
        ]);
    }

    public function submit()
    {
        $this->validate([
            'search' => 'min:3'
        ]);


    }
}
