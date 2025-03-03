<div class="mb-4 w-1/2">
    <x-input-label for="color">{{ __('Color') }}</x-input-label>
    <div class="flex items-center gap-2 mt-1">

        <input
            id="color"
            type="color"
            class="h-10 w-10 rounded-full cursor-pointer bg-gray-800"
            wire:model="value"
        />

        <x-text-input
            id="color-code"
            class="block w-full"
            placeholder="#000000"
            wire:model="value"
            name="color"
        />
    </div>
    @error('value')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>