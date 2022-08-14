<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Support\Collection;
use App\Contracts\Repositories\QuestionRepositoryContract;

class QuestionRepository implements QuestionRepositoryContract
{
    public function all(): array
    {
        return Question::with('options')->latest()->get()->toArray();
    }

    public function create(array $question): array
    {
        $question = Question::create($question);

        return $question;
    }
}
