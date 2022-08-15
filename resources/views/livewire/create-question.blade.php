
<div class="container">
    <form wire:submit.prevent='create'>
        <h1>Добавить вопрос</h1>
        <input type="text" name="question" class="form-control" wire:model='question'><br>

        @error('question')
            {{ $message }}
        @enderror

        <input type="submit" class="btn btn-success" value="добавить вопрос">
    </form>
</div>
