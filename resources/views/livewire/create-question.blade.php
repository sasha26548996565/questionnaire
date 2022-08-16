<div class="container">
    <form wire:submit.prevent='store'>
        <h1>Добавить вопрос</h1>
        <input type="text" name="question" class="form-control" wire:dirty.class='border border-info' wire:model.lazy='question'><br>

        @error('question')
            {{ $message }}
        @enderror

        @foreach ($options as $index => $option)
            <div class="mb-3" wire:key='option-field-{{ $index }}'>
                <label for="option-field-{{ $index }}" class="form-label">вариант ответа #{{ $index }}</label>
                <input type="text" class="form-control @error('options.'.$index) is-invalid @enderror"
                    wire:model='options.{{ $index }}' id="option-field{{ $index }}">
                @error('options.'.$index)
                    {{ $message }}
                @enderror
            </div>
        @endforeach

        @error('options')
            {{ $message }}
        @enderror

        <div class="mb-3">
            <button type="button" class="btn btn-info" wire:click='addEmptyOption'>добавить вариант ответа</button>
        </div>

        <div class="mb-3">
            <label for="right_answer" class="form-label">Правильный вариант</label>
            <select class="form-select @error('right_answer') is-invalid @enderror" wire:model="right_answer">
                @foreach($options as $index => $option)
                    @if(! empty($option))
                        <option value="{{$index}}" wire:key="right-answer-{{ $index }}">{{ $option }}</option>
                    @endif
                @endforeach
            </select>
            @error('right_answer')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <input type="submit" class="btn btn-success" value="добавить вопрос">
    </form>
</div>
