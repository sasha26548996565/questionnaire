<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Question extends Component
{
    public function render(): View
    {
        return view('livewire.question')->extends('layouts.app');
    }
}
