<div>
    <form wire:submit.prevent="saveLink">
        <div class="mb-4">
            <label for="url">URL</label>
            <x-input wire:model.lazy="url" id="url" class="block my-2 w-full" type="text" placeholder="Your Link" required autofocus />
            @error('url') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="slug">Slug</label>
            <x-input wire:model.lazy="slug" id="slug" class="block my-2 w-full" type="text" placeholder="my-new-link" />
            @error('slug') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <x-secondary-button wire:click="resetForm" type="button">
                Reset
            </x-secondary-button>

            <x-primary-button type="submit">
                Create
            </x-primary-button>
        </div>
    </form>
</div>