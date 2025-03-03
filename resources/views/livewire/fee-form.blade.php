<div>
    <form method="POST" action="{{ $formAction }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Concept -->
            <div class="mb-4">
                <x-input-label for="concept">{{ __('Concept') }}</x-input-label>
                <x-text-input id="concept" name="concept" class="block mt-1 w-full" placeholder="Concept"
                    value="{{ old('concept') }}" />
                @error('concept')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Import -->
            <div class="mb-4">
                <x-input-label for="import">{{ __('Import') }}</x-input-label>
                <x-text-input id="import" name="import" type="text" step="0.01" class="block mt-1 w-full"
                    placeholder="Import" value="{{ old('import') }}" />
                @error('import')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Due Date -->
            <div class="mb-4">
                <x-input-label for="due_date">{{ __('Due Date') }}</x-input-label>
                <x-text-input id="due_date" name="due_date" type="datetime-local" class="block mt-1 w-full"
                    value="{{ old('due_date') }}" />
                @error('due_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Global Fee Toggle -->
            <div class=" flex items-center">
                <x-input-label class="mr-3 font-medium">{{ __('Assign to all users') }}</x-input-label>
                <label for="globalFee" class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:model="globalFee" id="globalFee" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-300 rounded-full peer dark:bg-gray-700 peer-checked:bg-gray-900 transition duration-300"></div>
                    <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 peer-checked:translate-x-5 peer-checked:bg-white shadow-md"></div>
                </label>
                <input type="hidden" name="globalFee" value="{{ $globalFee ? '1' : '0' }}">
            </div>

        </div>

        <!-- User Selection -->
        <div class="mb-4">
            <x-input-label for="user_id">{{ __('Assigned User') }}</x-input-label>
            <select id="user_id" name="user_id"
                class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700 transition-opacity duration-300 ease-in-out"
                @if ($globalFee) disabled class="opacity-50 cursor-not-allowed" @endif>
                <option value="">{{ __('Select one') }}</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Notes -->
        <div class="mb-4">
            <x-input-label for="notes">{{ __('Notes') }}</x-input-label>
            <x-text-input id="notes" name="notes" type="text" class="block mt-1 w-full"
                value="{{ old('notes') }}" placeholder="{{ __('Notes') }}" />
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-all duration-300">
                {{ __('Create Fee') }}
            </button>
        </div>
    </form>
</div>
