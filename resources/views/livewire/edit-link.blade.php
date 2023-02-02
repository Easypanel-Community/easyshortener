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

        <div class="flex justify-end">
            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-100"
            >
                Save
            </button>
        </div>
    </form>
</div>