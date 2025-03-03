<div class="flex space-x-2">
    <!-- Editar -->

    <a href="{{ route('status.show', $status->id) }}"
        class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-700 transition duration-300"
        title="Edit Status">
         <i class="fa-solid fa-eye"></i>
     </a>
 
    <a href="{{ route('status.edit', $status->id) }}"
       class="p-2 rounded-full bg-yellow-500 text-white hover:bg-yellow-700 transition duration-300"
       title="Edit Status">
        <i class="fa-solid fa-pen"></i>
    </a>

    <!-- Eliminar -->
    <button wire:click.prevent="$emit('confirmDelete', {{ $status->id }})"
            class="p-2 rounded-full bg-red-500 text-white hover:bg-red-700 transition duration-300"
            title="Delete Status">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>
