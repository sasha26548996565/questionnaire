<?php

namespace App\Providers;

use App\Contracts\Repositories\QuestionRepositoryContract;
use App\Repositories\QuestionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(QuestionRepositoryContract::class, fn($app) => new QuestionRepository());
    }
}
