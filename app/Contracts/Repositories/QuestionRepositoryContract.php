<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use App\DTO\QuestionDTO;
use Illuminate\Support\Collection;

interface QuestionRepositoryContract
{
    public function all(): array;
    public function count(): int;
    public function create(QuestionDTO $collection);
}
