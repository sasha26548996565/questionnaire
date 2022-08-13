<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'question_id' => Question::get()->random()->id,
        ];
    }
}
