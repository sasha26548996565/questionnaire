<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    public function run()
    {
        Option::factory(25)->create();
    }
}
