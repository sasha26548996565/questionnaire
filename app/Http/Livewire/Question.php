<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Contracts\Repositories\OptionRepositoryContract;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Contracts\Repositories\QuestionRepositoryContract;

class Question extends Component
{
    public string $question;
    public Collection $options;
    public $answer;

    public function mount(QuestionRepositoryContract $questionRepository, OptionRepositoryContract $optionRepository): void
    {
        $questions = $questionRepository->all();
        $question = $questions->first();

        $this->question = $question->name;
        $this->options = $question->options;
    }

    public function render(): View
    {
        return view('livewire.question')->extends('layouts.app');
    }
}
