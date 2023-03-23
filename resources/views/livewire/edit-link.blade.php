<div>
    <form wire:submit.prevent="saveLink">
        <div class="mb-4">
            <label for="url">URL</label>
            <x-input wire:model.lazy="url" id="url" class="block my-2 w-full" type="text" placeholder="Your link" required autofocus />
            @error('url') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="slug">Slug</label>
            <x-input wire:model.lazy="slug" id="slug" class="block my-2 w-full" type="text" placeholder="my-new-link" />
            @error('slug') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="is_enabled">Enabled</label>
            <select wire:model.lazy="is_enabled" id="is_enabled" class="block my-2 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @error('is_enabled') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" href="delete">
                Delete
            </a>
            <x-primary-button type="submit">
                Save
            </x-primary-button>
        </div>
    </form>
</div>