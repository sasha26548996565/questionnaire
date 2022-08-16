<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Contracts\Repositories\QuestionRepositoryContract;
use App\DTO\QuestionDTO;
use Livewire\Component;
use Livewire\Redirector;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\View\View;

class CreateQuestion extends Component
{
    public $question;
    public array $options = [];
    public $right_answer;

    protected $rules = [
        'question' => 'required',
        'options' => ['required', 'array'],
        'options.*' => ['required', 'string', 'distinct'],
        'right_answer' => 'required'
    ];

    protected $messages = [
        'question.required' => 'Вопрос обязателен для заполнения',
        'options.*.distinct' => 'Варианты ответов не должны совпадать'
    ];

    public function updated($propertyName): void
    {
        if (preg_match('/options\.[0-9]/', $propertyName))
        {
            $this->validateOnly($propertyName);
        }
    }
    public function addEmptyOption(): void
    {
        $this->options[] = null;
    }

    public function store(QuestionRepositoryContract $questionRepostory): Redirector
    {
        $questionRepostory->create(new QuestionDTO($this->validate()));

        return to_route('index');
    }

    public function render(): View
    {
        return view('livewire.create-question');
    }
}
