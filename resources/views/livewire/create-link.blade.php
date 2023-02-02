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

        <div class="flex justify-end">
            <button
                wire:click="resetForm"
                type="button"
                class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-100 mr-2"
            >
                Reset
            </button>
            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-100"
            >
                Create
            </button>
        </div>
    </form>
</div>