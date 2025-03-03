<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Complete Task') . ' Nº' . "$task->id" }}
        </h2>
    </x-slot>
    <x-app-container>
        <form method="POST" action="{{ route('task.complete', $task->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-input-label for="post_notes" :value="__('Posterior Notes')" />
                <textarea id="post_notes" name="post_notes" rows="4"
                    class="w-full p-2 border rounded-md dark:bg-gray-800 dark:text-gray-200 @error('post_notes') border-red-500 @enderror"></textarea>

                @error('post_notes')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="large_size">Large File
                    Input</label>
                <input
                    class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('attachment.*') border-red-500 @enderror"
                    name="attachment[]" type="file" multiple>

                @error('attachment.*')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <x-primary-button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    {{ __('Submit Completion') }}
                </x-primary-button>
            </div>
        </form>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('CIF') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->cif }}</p>
            </div>

            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Name') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->name }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Phone') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->phone }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Email') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->email }}</p>
            </div>

            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Creation Date') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->creation_date }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Completion Date') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->finish_date ?? __('Task date pending.') }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Employee') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->employee->name ?? __('Not selected yet') }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Province') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->province->nombre }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Postal code') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->postal_code }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Status') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200" style="color: {{ $task->status->color }}">
                    {{ $task->status->name }}</p>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-4">
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Address') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->address }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Description') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->description }}</p>
            </div>
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Previous Notes') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->pre_notes ?? __('No notes added.') }}</p>
            </div>
        </div>

        <!-- Botón para volver -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('task.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Back') }}
            </a>
        </div>
    </x-app-container>
</x-app-layout>
