<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    public function definition()
    {
        return [
            'question' => $this->faker->word,
            'right_answer' => 1,
            'options' => json_encode(['item1', 'var1'])
        ];
    }
}
