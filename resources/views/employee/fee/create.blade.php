<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Fee') }}
        </h2>
    </x-slot>

    <x-app-container>
        @livewire('fee-form')
    </x-app-container>
</x-app-layout>
