<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Support\Collection;
use App\Contracts\Repositories\QuestionRepositoryContract;

class QuestionRepository implements QuestionRepositoryContract
{
    public function all(): Collection
    {
        return collect(Question::latest()->get());
    }

    public function create(Collection $question): Collection
    {
        $question = Question::create($question->toArray());

        return collect($question);
    }
}
