<div>

    <input type="search" wire:model.debounce.100ms="search">
        @error('search') {{ $message }} @enderror

    <div wire:loading>
        Searching ....
    </div>

<br>
    @foreach($users as $user)
        {{ $user->username }}<br>
    @endforeach
</div>
