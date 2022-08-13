<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Contracts\Repositories\QuestionRepositoryContract;

class QuestionSeeder extends Seeder
{
    public function run(QuestionRepositoryContract $questionRepository)
    {
        Question::factory(5)->create();
    }
}
