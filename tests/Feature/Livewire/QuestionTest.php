<?php

namespace Tests\Feature\Livewire;

use Mockery;
use Tests\TestCase;
use Livewire\Livewire;
use Mockery\MockInterface;
use App\Http\Livewire\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Contracts\Repositories\QuestionRepositoryContract;

class QuestionTest extends TestCase
{
    use WithFaker;

    public function fakeQuestions(int $count): array
    {
        $questions = [];

        for ($i = 0; $i <= $count; $i++)
        {
            $questions[] = ['question' => $this->faker->word, 'right_answer' => $this->faker->numberBetween(0, 1),
                'options' => [$this->faker->word, $this->faker->word]];
        }

        return $questions;
    }

    public function test_get_current_result(): void
    {
        $questions = $this->fakeQuestions(2);

        $this->instance(
            QuestionRepositoryContract::class,
            Mockery::mock(QuestionRepositoryContract::class, fn (MockInterface $mock) => $mock->shouldReceive('all')->once()
                ->andReturn($questions))
        );

        Livewire::test(Question::class)
            ->call('loadQuestions')
            ->call('getCurrentResult')
            ->assertSee('0/'. count($questions));
    }

    public function test_get_result(): void
    {
        $questions = $this->fakeQuestions(1);

        $this->instance(
            QuestionRepositoryContract::class,
            Mockery::mock(QuestionRepositoryContract::class, fn (MockInterface $mock) => $mock->shouldReceive('all')->once()
                ->andReturn($questions))
        );

        Livewire::test(Question::class)
            ->call('loadQuestions')
            ->set('answer', 1)
            ->call('next')
            ->assertViewHas('answer', null)
            ->assertViewIs('livewire.question');
    }
}
