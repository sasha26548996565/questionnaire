<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class CreateQuestion extends Component
{
    public $question;

    protected $rules = ['question' => 'required'];
    protected $messages = ['question.required' => 'Заполните поле question'];

    public function create(): void
    {
        Debugbar::info(1);
        $params = $this->validate();
    }

    public function render()
    {
        return view('livewire.create-question');
    }
}
