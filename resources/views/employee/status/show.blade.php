<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Status').' Nº'."$status->id" }}
        </h2>
    </x-slot>
    <x-app-container>
        <!-- Mostrar detalles de la tarea -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nombre del Status -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Name') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $status->name }}</p>
            </div>

            <!-- Código del Status -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Code') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $status->code }}</p>
            </div>

            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Color') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200 mt-2"><i class="fa-solid fa-palette fa-2xl" style="color: {{ $status->color }};"></i> {{ $status->color }}</p>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <a href="{{ route('status.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Back') }}
            </a>
        </div>
    </x-app-container>
</x-app-layout>
