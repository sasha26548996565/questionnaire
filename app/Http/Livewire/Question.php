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
    public int $countQuestions;
    public array $options = [];
    public $answer;
    public $keyCurrentQuestion;
    public array $questions;
    public $result;
    public $currentResult;

    public function mount(QuestionRepositoryContract $questionsRepository)
    {
        $this->questions = $questionsRepository->all();
        $this->countQuestions = $questionsRepository->count();
    }

    public function getQuestionsCount(QuestionRepositoryContract $questionsRepository): void
    {
        $this->countQuestions = $questionsRepository->count();
    }

    public function getCurrentResult(): void
    {
        $this->currentResult = $this->keyCurrentQuestion . '/' . count($this->questions);
    }

    public function loadQuestions(): void
    {
        $this->toggleQuestion();
    }

    public function toggleQuestion(): void
    {
        $currentQuestion = null;

        foreach ($this->questions as $key => $question)
        {
            if (!array_key_exists('passed', $question))
            {
                $currentQuestion = $question;
                $this->keyCurrentQuestion = $key;
                $this->question = $currentQuestion['question'];
                $this->options = $currentQuestion['options'];
                break;
            }
        }

        if (is_null($currentQuestion))
        {
            $this->result = $this->calculateRightAnswers($this->questions);
        }
    }

    public function calculateRightAnswers(array $questions)
    {
        return array_reduce($questions, function ($carry, $question) {
            if ($question['answer_got'] == $question['right_answer'])
            {
                $carry = $carry + 1;
            }

            return $carry;
        }, 0);
    }

    public function next()
    {
        $this->questions[$this->keyCurrentQuestion] = array_merge($this->questions[$this->keyCurrentQuestion], [
           'passed' => true, 'answer_got' => $this->answer
        ]);
        $this->toggleQuestion();
        $this->reset('answer');
    }

    public function render(): View
    {
        return view('livewire.question')->extends('layouts.app');
    }
}
