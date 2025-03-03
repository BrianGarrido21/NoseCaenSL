<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>
    <x-app-container>
        <form method="POST" action="{{ route('task.store') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::guard('employee')->user()->id }}">
            <!-- Sección de dos columnas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Campo para el nombre -->
                <div class="mb-4">
                    <x-input-label for="name">{{ __('Name') }}</x-input-label>
                    <x-text-input id="name" name="name" class="block mt-1 w-full" value="{{ Auth::guard('employee')->user()->name }}" readonly />
                </div>
                <!-- Campo para el teléfono -->
                <div class="mb-4">
                    <x-input-label for="phone">{{ __('Phone') }}</x-input-label>
                    <x-text-input id="phone" name="phone" class="block mt-1 w-full" value="{{ Auth::guard('employee')->user()->phone }}" readonly />
                </div>
                <!-- Campo para el correo electrónico -->
                <div class="mb-4">
                    <x-input-label for="email">{{ __('Email') }}</x-input-label>
                    <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" value="{{ Auth::guard('employee')->user()->email }}" readonly />
                </div>
                <!-- Campo para el código postal -->
                <div class="mb-4">
                    <x-input-label for="postal_code">{{ __('Postal code') }}</x-input-label>
                    <x-text-input id="postal_code" name="postal_code" class="block mt-1 w-full" placeholder="Postal code" value="{{ old('postal_code') }}"   />
                    @error('postal_code')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Campo para la fecha de finalización -->
                <div class="mb-4">
                    <x-input-label for="finish_date">{{ __('Finish Date') }}</x-input-label>
                    <x-text-input id="finish_date" name="finish_date" type="datetime-local" class="block mt-1 w-full" value="{{ old('finish_date') }}" />
                    @error('finish_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Selección de empleado -->
                <div class="mb-4">
                    <x-input-label for="employee_id">{{ __('Employee') }}</x-input-label>
                    <select id="employee_id" name="employee_id" class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700">
                        <option value="">Select one</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Selección de provincia -->
                <div class="mb-4">
                    <x-input-label for="province_id">{{ __('Province') }}</x-input-label>
                    <select id="province_id" name="province_id" class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700">
                        <option value="">Select one</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->cod }}" {{ old('province_id') == $province->cod ? 'selected' : '' }}>
                                {{ $province->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Selección de estado -->
                <div class="mb-4">
                    <x-input-label for="status_id">{{ __('Status') }}</x-input-label>
                    <select id="status_id" name="status_id" class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700">
                        <option value="">Select one</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- Sección de una columna -->
            <div class="grid grid-cols-1 gap-4 mt-4">
                <div class="mb-4">
                    <x-input-label for="address">{{ __('Address') }}</x-input-label>
                    <x-text-input id="address" name="address" class="block mt-1 w-full" placeholder="Address" value="{{ old('address') }}" />
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Campo para la descripción -->
                <div class="mb-4">
                    <x-input-label for="description">{{ __('Description') }}</x-input-label>
                    <textarea id="description" name="description" class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Campo para las notas previas -->
                <div class="mb-4">
                    <x-input-label for="pre_notes">{{ __('Previous Notes') }}</x-input-label>
                    <textarea id="pre_notes" name="pre_notes" class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700" rows="3">{{ old('pre_notes') }}</textarea>
                </div>
            </div>
            <!-- Botón de envío -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    {{ __('Create Task') }}
                </button>
            </div>
        </form>
    </x-app-container>
</x-app-layout>
