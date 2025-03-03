<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Fee') }}
        </h2>
    </x-slot>
    <x-app-container>
        <form method="POST" action="{{ route('fee.update', $fee->id) }}">
            @csrf
            @method('PUT')
            <!-- Sección de dos columnas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Campo para el concepto -->
                <div class="mb-4">
                    <x-input-label for="concept">{{ __('Concept') }}</x-input-label>
                    <x-text-input id="concept" name="concept" class="block mt-1 w-full" placeholder="Concept" value="{{ old('concept', $fee->concept) }}" />
                    @error('concept')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Campo para el importe -->
                <div class="mb-4">
                    <x-input-label for="import">{{ __('Import') }}</x-input-label>
                    <x-text-input id="import" name="import" type="text" step="0.01" class="block mt-1 w-full" placeholder="Import" value="{{ old('import', $fee->import) }}" />
                    @error('import')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Campo para la fecha de vencimiento -->
                <div class="mb-4">
                    <x-input-label for="due_date">{{ __('Due Date') }}</x-input-label>
                    <x-text-input id="due_date" name="due_date" type="datetime-local" class="block mt-1 w-full" value="{{ old('due_date', $fee->due_date) }}" />
                    @error('due_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Campo para el estado de pago -->
                <div class="mb-4">
                    <x-input-label for="is_paid">{{ __('Paid') }}</x-input-label>
                    <select id="is_paid" name="is_paid" class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700">
                        <option value="0" {{ old('is_paid', $fee->is_paid) == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
                        <option value="1" {{ old('is_paid', $fee->is_paid) == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                    </select>
                    @error('is_paid')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Selección de usuario -->
                <div class="mb-4">
                    <x-input-label for="user_id">{{ __('Assigned User') }}</x-input-label>
                    <select id="user_id" name="user_id" class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700">
                        <option value="">{{ __('Select one') }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $fee->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- Botón de envío -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    {{ __('Update Fee') }}
                </button>
            </div>
        </form>
    </x-app-container>
</x-app-layout>
