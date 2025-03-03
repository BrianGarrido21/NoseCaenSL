<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fee').' Nº'."$fee->id"  }}
        </h2>
    </x-slot>
    <x-app-container>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Concept') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $fee->concept }}</p>
            </div>
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Name') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $fee->user->name }}</p>
            </div>
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Email') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $fee->user->email }}</p>
            </div>
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Phone') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $fee->user->phone }}</p>
            </div>
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Due Date') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $fee->due_date }}</p>
            </div>
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Import') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $fee->import." €" }}</p>
            </div>
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Paid') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $fee->is_paid ? __('Paid') : __('Unpaid') }}</p>
            </div>
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-800 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                <x-input-label>{{ __('Notes') }}</x-input-label>
                <p class="text-gray-800 dark:text-gray-200">{{ $fee->notes }}</p>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <!-- Botón de Pago con PayPal -->
            <a href="{{ route('paypal.pay', $fee->id) }}" 
                class="flex items-center gap-2 px-5 py-2 bg-yellow-400 text-gray-800 font-semibold rounded-md shadow hover:bg-yellow-500 transition">
                <i class="fab fa-paypal text-xl"></i>
                {{ __('Pagar con tarjeta') }}
            </a>

            <a href="{{ route('fee.download', $fee->id) }}" 
                class="px-4 mx-2 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Download PDF') }}
            </a>
        
            <a href="{{ route('fee.resend', $fee->id) }}" 
                class="px-4 mx-2 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Resend PDF') }}
            </a>
        
            <a href="{{ route('fee.index') }}" 
                class="px-4 py-2 mx-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                {{ __('Back') }}
            </a>
        

        </div>
        
        


    </x-app-container>
</x-app-layout>
