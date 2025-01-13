<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $message = "Bem-vindo à página inicial!";

    public function render()
    {
        return view('livewire.home');
    }

    public function changeMessage()
    {
        $this->message = "Você clicou no botão!";
    }
}
