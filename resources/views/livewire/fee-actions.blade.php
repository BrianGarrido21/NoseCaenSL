<div class="flex space-x-2">
    <!-- Botón Editar -->
    <a href="{{ route('fee.show', $fee->id) }}"
        class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-700 transition duration-300" title="Edit Fee">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a href="{{ route('fee.edit', $fee->id) }}"
        class="p-2 rounded-full bg-yellow-500 text-white hover:bg-yellow-700 transition duration-300" title="Edit Fee">
        <i class="fa-solid fa-pen"></i>
    </a>

    <!-- Botón Eliminar -->
    <button wire:click.prevent="$emit('confirmDelete', {{ $fee->id }})"
        class="p-2 rounded-full bg-red-500 text-white hover:bg-red-700 transition duration-300" title="Delete Fee">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>
