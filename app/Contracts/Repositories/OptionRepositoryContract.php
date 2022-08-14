<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface OptionRepositoryContract
{
    public function all(): Collection;
    public function create(Collection $collection): Collection;
}
