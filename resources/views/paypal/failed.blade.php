<x-app-layout>
    <x-app-container>
        <div class="container mx-auto mt-10">
            <div class="bg-red-100 text-red-800 p-5 rounded shadow">
                <h1 class="text-2xl font-bold mb-4">Error en el pago</h1>
                <p>{{ session('status') }}</p>

                <a href="{{ route('home') }}" class="mt-4 inline-block bg-red-600 text-white px-4 py-2 rounded">
                    Volver al inicio
                </a>
            </div>
        </div>
</x-app-container>
</x-app-layout>
