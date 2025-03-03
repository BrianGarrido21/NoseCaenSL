<x-app-layout>
    <x-app-container>
        <div class="container mx-auto mt-10">
            <div class="bg-green-100 text-green-800 p-5 rounded shadow">
                <h1 class="text-2xl font-bold mb-4">¡Pago completado!</h1>
                <p>{{ session('status') ?? 'El pago se realizó correctamente.' }}</p>

                <a href="{{ route('employee.dashboard') }}"
                    class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded">
                    Volver al panel
                </a>
            </div>
        </div>
    </x-app-container>
</x-app-layout>
