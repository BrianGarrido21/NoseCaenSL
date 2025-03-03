<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task') . ' Nº' . "$task->id" }}
        </h2>
    </x-slot>
    <x-app-container>
        <!-- Mostrar detalles de la tarea -->
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
            <div
                class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Posterous Notes') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $task->post_notes ?? __('No notes added.') }}</p>
            </div>
        </div>


        <div class="mt-6 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                📎 {{ __('Attachments') }}
            </h3>
        
            @if($task->summary_uri)
                @php
                    $files = json_decode($task->summary_uri, true);
                @endphp
        
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($files as $file)
                        @php
                            $fileUrl = asset('storage/' . $file);
                            $extension = pathinfo($file, PATHINFO_EXTENSION);
                        @endphp
                        
                        <div class="p-4 bg-gray-100 dark:bg-gray-900 rounded-lg shadow-lg flex flex-col items-center justify-center transition transform hover:scale-105 hover:bg-gray-200 dark:hover:bg-gray-700">
                            @if(in_array($extension, ['jpg', 'jpeg', 'png']))
                                <img src="{{ $fileUrl }}" alt="Attachment" class="rounded-lg w-full h-40 object-cover shadow-md">
                                <a href="{{ $fileUrl }}" class="text-white-500 hover:underline mt-2" download>
                                    {{ __('Download Image') }}
                                </a>
                            @elseif($extension === 'pdf')
                                <div class="flex flex-col items-center">
                                    <iframe src="{{ $fileUrl }}" class="w-full h-64 rounded-lg shadow-md"></iframe>
                                    <a href="{{ $fileUrl }}" target="_blank" class="block text-white-500 hover:underline mt-2 text-center">
                                        {{ __('Open PDF in New Tab') }}
                                    </a>
                                </div>
                            @else
                                <div class="flex flex-col items-center">
                                    <span class="text-3xl">📂</span>
                                    <a href="{{ $fileUrl }}" download class="text-white-500 hover:underline mt-2">
                                        {{ __('Download File') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <p class="text-gray-600 dark:text-gray-300 text-lg italic">{{ __('No attachments added.') }}</p>
                </div>
            @endif
        </div>
        
        <!-- Botón para volver -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('task.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Back') }}
            </a>
        </div>
    </x-app-container>
</x-app-layout>
