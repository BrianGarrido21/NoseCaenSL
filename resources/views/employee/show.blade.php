<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee').' Nº' . $employee->id }}
        </h2>
    </x-slot>

    <x-app-container>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- DNI -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('DNI') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $employee->dni }}</p>
            </div>

            <!-- Nombre -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Name') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $employee->name }}</p>
            </div>

            <!-- Email -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Email') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $employee->email }}</p>
            </div>

            <!-- Teléfono -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Phone') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $employee->phone }}</p>
            </div>

            <!-- Dirección -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Address') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $employee->address }}</p>
            </div>
            
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Role') }}</x-input-label>
                <p style="color: {{ $employee->roles->isNotEmpty() ? $employee->roles->first()->color : "#FFFFFF" }}">
                    {{ $employee->roles->isNotEmpty() ? ucfirst($employee->roles->first()->name) : __('No role assigned') }}</p>
            </div>

        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('employee.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Back') }}
            </a>
        </div>
    </x-app-container>
</x-app-layout>
