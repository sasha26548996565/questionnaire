<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public string $title;
    public string $message;
    public bool $show = false;

    protected $listeners = ['quizPassed'];

    public function quizPassed(): void
    {
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.toast');
    }
}
