<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role').' Nº'." $role->id" }}
        </h2>
    </x-slot>
    <x-app-container>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nombre del Role -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Name') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ ucfirst($role->name) }}</p>
            </div>

            <!-- Color del Role -->
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Color') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200 mt-2">
                    <i class="fa-solid fa-palette fa-2xl" style="color: {{ $role->color }};"></i>
                    {{ $role->color }}
                </p>
            </div>
        </div>

        <!-- Lista de permisos asignados -->
        <div class="mt-6">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 mb-4">
                {{ __('Assigned Permissions') }}
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse ($role->permissions as $permission)
                    <div class="flex items-center bg-gray-100 dark:bg-gray-800 p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                        <i class="fa-solid fa-check text-green-500 mr-2"></i>
                        <span class="text-gray-900 dark:text-gray-200">{{ ucfirst($permission->name) }}</span>
                    </div>
                @empty
                    <p class="text-gray-800 dark:text-gray-200">{{ __('No permissions assigned to this role.') }}</p>
                @endforelse
            </div>
        </div>

        <!-- Botón de regreso -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('role.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Back') }}
            </a>
        </div>
    </x-app-container>
</x-app-layout>
