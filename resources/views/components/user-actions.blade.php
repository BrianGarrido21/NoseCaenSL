<div class="flex space-x-2">
    <a href="{{ route('user.show', $user->id) }}"
        class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-700 transition duration-300"
        title="Edit User">
         <i class="fa-solid fa-eye"></i>
     </a>
    <!-- Editar -->
    <a href="{{ route('user.edit', $user->id) }}"
       class="p-2 rounded-full bg-yellow-500 text-white hover:bg-yellow-700 transition duration-300"
       title="Edit User">
        <i class="fa-solid fa-pen"></i>
    </a>

    <!-- Eliminar -->
    <button wire:click.prevent="$emit('confirmDelete', {{ $user->id }})"
        class="p-2 rounded-full bg-red-500 text-white hover:bg-red-700 transition duration-300"
        title="Delete User">
    <i class="fa-solid fa-trash"></i>
</button>
</div>
