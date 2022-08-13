<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Contracts\Repositories\QuestionRepositoryContract;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Question extends Component
{
    public string $questions;
    public Collection $options;
    public $answer;

    public function mount(QuestionRepositoryContract $questionRepository): void
    {
        $questions = $questionRepository->all();
        $this->question = $questions->first();
        $this->options = $questions->first()->options;
    }

    public function render(): View
    {
        return view('livewire.question')->extends('layouts.app');
    }
}
