<div class="container">
    <div class="px-3 max-w-5xl mx-auto">
        <h1 class="py-5 text-center text-3xl font-extrabold">Start A Discussion</h1>
        <form wire:submit='submit'>
            @csrf
            <div class="py-2 space-y-2">
                <label for="title" class="text-sm">TITLE</label>
                <input type="text" name="title" class="input input-secondary w-full" wire:model="title"
                    wire:error='title'>
                @error('title')
                    <span class="text-error text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="py-2 space-y-2">
                <label for="title" class="text-sm">BODY</label>
                <textarea class="textarea textarea-secondary w-full h-72" wire:model="body" wire:error='body'></textarea>
                @error('body')
                    <span class="text-error text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-secondary text-secondary-content font-bold" wire:submit='submit'>SUBMIT</button>
        </form>
    </div>
</div>
