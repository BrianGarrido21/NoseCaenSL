<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Role') }}
        </h2>
    </x-slot>
    <x-app-container>
        <form method="POST" action="{{ route('role.store') }}">
            @csrf

            <div class="flex gap-4">

                <div class="mb-4 w-1/2">
                    <x-input-label for="name">{{ __('Name') }}</x-input-label>
                    <x-text-input id="name" name="name" class="block mt-1 w-full" placeholder="Name" value="{{ old('name') }}" />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <livewire:color-picker/>   

            </div>

            <livewire:permission-selector :permissions="$permissions" />

            

            <!-- Botón de envío -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    {{ __('Create ') }}
                </button>
            </div>
        </form>
    </x-app-container>
</x-app-layout>


