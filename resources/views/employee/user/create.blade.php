<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <x-app-container>
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <!-- Sección de dos columnas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Campo para el CIF -->
                <div class="mb-4">
                    <x-input-label for="cif">{{ __('CIF') }}</x-input-label>
                    <x-text-input id="cif" name="cif" class="block mt-1 w-full" placeholder="CIF" value="{{ old('cif') }}" />
                    @error('cif')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo para el nombre -->
                <div class="mb-4">
                    <x-input-label for="name">{{ __('Name') }}</x-input-label>
                    <x-text-input id="name" name="name" class="block mt-1 w-full" placeholder="Name" value="{{ old('name') }}" />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo para el email -->
                <div class="mb-4">
                    <x-input-label for="email">{{ __('Email') }}</x-input-label>
                    <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" placeholder="Email" value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo para el teléfono -->
                <div class="mb-4">
                    <x-input-label for="phone">{{ __('Phone') }}</x-input-label>
                    <x-text-input id="phone" name="phone" class="block mt-1 w-full" placeholder="Phone" value="{{ old('phone') }}" />
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <x-input-label for="credit_card">{{ __('Credit Card') }}</x-input-label>
                    <x-text-input id="credit_card" name="credit_card" class="block mt-1 w-full" placeholder="Credit card" />
                    @error('credit_card')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo para la dirección -->
                <div class="mb-4">
                    <x-input-label for="address">{{ __('Address') }}</x-input-label>
                    <x-text-input id="address" name="address" class="block mt-1 w-full" placeholder="Address" value="{{ old('address') }}" />
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Selección de país -->
                <div class="mb-4">
                    <x-input-label for="country_id">{{ __('Country') }}</x-input-label>
                    <select id="country_id" name="country_id" class="block mt-1 w-full rounded-md dark:bg-gray-900 border-gray-300 dark:border-gray-700">
                        <option value="">{{ __('Select a country') }}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                {{ $country->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botón de envío -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    {{ __('Create User') }}
                </button>
            </div>
        </form>
    </x-app-container>
</x-app-layout>
