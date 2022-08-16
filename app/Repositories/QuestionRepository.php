<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\QuestionDTO;
use App\Models\Question;
use Illuminate\Support\Collection;
use App\Contracts\Repositories\QuestionRepositoryContract;

class QuestionRepository implements QuestionRepositoryContract
{
    public function all(): array
    {
        return Question::latest()->get()->toArray();
    }

    public function create(QuestionDTO $question)
    {
        Question::create($question->toArray());
    }

    public function count(): int
    {
        return Question::count();
    }
}
