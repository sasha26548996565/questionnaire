<?php

namespace App\Providers;

use App\Repositories\OptionRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\QuestionRepository;
use App\Contracts\Repositories\OptionRepositoryContract;
use App\Contracts\Repositories\QuestionRepositoryContract;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(QuestionRepositoryContract::class, fn($app) => new QuestionRepository());
        $this->app->bind(OptionRepositoryContract::class, fn($app) => new OptionRepository());
    }
}
