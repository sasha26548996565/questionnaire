<div class="container container-quiz mt-sm-5 my-1">
    <div class="question ml-sm-5 pl-sm-5 pt-2" wire:init='loadQuestions'>
        <h2 wire:poll='getQuestionsCount'>Всего вопросов: {{ $countQuestions }}</h2>
        @if (is_null($result))
            <form wire:submit.prevent='next'>
                <div class="py-2 h5"><b>{{ $question }}</b></div>
                @foreach ($options as $key => $option)
                    <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                        <label class="options">{{ $option }}
                            <input type="radio" name="answer" wire:model='answer' value="{{ $key }}"><span class="checkmark"></span>
                        </label>
                    </div>
                @endforeach

                @if (is_null($answer) == false)
                    <p>Ваш ответ: {{ $options[$answer] }}</p>
                @endif

                <div class="d-flex align-items-center pt-3 justify-content-center">
                    <div wire:loading wire:target="next, loadQuestions">
                        <div class="spinner-border text-warning m-auto">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div wire:loading.remove wire:target="next, loadQuestions">
                        <div class="ml-auto mr-sm-5">
                            <button class="btn btn-success" {{ is_null($answer) ? 'disabled': '' }}>Следующий</button>
                        </div>
                    </div>
                </div>
                <br>
            </form>
        @else
            <div class="py-2 h5"><b>вы прошли тест</b></div>
            <div class="py-2 h5"><b>Результат: {{ $result }}/{{ count($questions) }}</b></div>
        @endif

        <div class="d-flex flex-column justify-content-center align-items-center">
            <div>
                <button wire:click.prefetch="getCurrentResult" class="btn btn-primary">Посмотреть промежуточный результат</button>
            </div>
            @if($currentResult)
                <div class="m-3">{{ $currentResult }}</div>
            @endif
        </div>

        <livewire:toast :title="'test passed'" :message="'you complete the test'">
    </div>
</div>
