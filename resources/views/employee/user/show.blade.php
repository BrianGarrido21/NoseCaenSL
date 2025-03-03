<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User').' Nº'."$user->id" }}
        </h2>
    </x-slot>

    <x-app-container>
        <!-- Mostrar detalles del usuario -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- CIF -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('CIF') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $user->cif }}</p>
            </div>

            <!-- Nombre -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Name') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $user->name }}</p>
            </div>

            <!-- Email -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Email') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $user->email }}</p>
            </div>

            <!-- Teléfono -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Phone') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $user->phone }}</p>
            </div>

            <!-- Dirección -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Address') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $user->address }}</p>
            </div>

            <!-- País -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Country') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $user->country->nombre ?? 'N/A' }}</p>
            </div>

            <!-- Moneda -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Currency') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ strtoupper($user->currency_iso ?? 'N/A') }}</p>
            </div>
        </div>

        <!-- Botón de regreso -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('user.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Back') }}
            </a>
        </div>
    </x-app-container>
</x-app-layout>
