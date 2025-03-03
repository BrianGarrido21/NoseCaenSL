<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Status') }}
        </h2>
    </x-slot>
    <x-app-container>
        <form method="POST" action="{{ route('status.update', $status->id) }}">
            @csrf
            @method('PUT')
            <!-- Sección de dos columnas -->
            <div class="flex gap-4">
                <!-- Campo para el Código -->
                <div class="mb-4 w-1/2">
                    <x-input-label for="code">{{ __('Code') }}</x-input-label>
                    <x-text-input 
                        id="code" 
                        name="code" 
                        class="block mt-1 w-full" 
                        placeholder="Code" 
                        value="{{ old('code', $status->code) }}" 
                    />
                    @error('code')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo para el Nombre -->
                <div class="mb-4 w-1/2">
                    <x-input-label for="name">{{ __('Name') }}</x-input-label>
                    <x-text-input 
                        id="name" 
                        name="name" 
                        class="block mt-1 w-full" 
                        placeholder="Name" 
                        value="{{ old('name', $status->name) }}" 
                    />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Selector de color -->
                <livewire:color-picker :value="$status->color"/>

            </div>

            <!-- Botón de envío -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    {{ __('Update Status') }}
                </button>
            </div>
        </form>
    </x-app-container>
</x-app-layout>
