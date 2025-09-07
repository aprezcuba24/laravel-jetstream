<div class="p-4">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="subject">
                {{ __('Subject') }}
            </label>
            <input wire:model="form.subject" id="subject" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white dark:border-gray-600">
            @error('form.subject') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="to">
                {{ __('To') }}
            </label>
            <input wire:model="form.to" id="to" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white dark:border-gray-600">
            @error('form.to') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="body">
                {{ __('Message') }}
            </label>
            <textarea wire:model="form.body" id="body" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white dark:border-gray-600"></textarea>
            @error('form.body') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-end">
            <x-button type="submit">
                {{ __('Send') }}
            </x-button>
        </div>
    </form>
</div>