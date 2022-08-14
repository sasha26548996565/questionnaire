<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;
use App\Contracts\Repositories\OptionRepositoryContract;
use App\Models\Option;

class OptionRepository implements OptionRepositoryContract
{
    public function all(): Collection
    {
        return collect(Option::latest()->get());
    }

    public function getByQuestion(int $questionId): Collection
    {
        $options = Option::where('question_id', $questionId)->latest()->get();

        return collect($options);
    }

    public function create(Collection $question): Collection
    {
        $question = Option::create($question->toArray());

        return collect($question);
    }
}
