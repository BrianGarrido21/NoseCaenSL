<div class="flex space-x-2">
    <!-- Botón Completar -->
    @if (Auth::guard('employee')->user()->can('complete task'))
        <a href="{{ route('task.complete', $task->id) }}"
            class="p-2 rounded-full bg-green-500 text-white hover:bg-green-700 transition duration-300"
            title="Complete Task">
            <i class="fa-solid fa-check"></i>
        </a>
    @endif

    <!-- Botón Ver -->
    @if (Auth::guard('employee')->user()->can('read task'))

    <a href="{{ route('task.show', $task->id) }}"
        class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-700 transition duration-300" title="View Task">
        <i class="fa-solid fa-eye"></i>
    </a>
    @endif

    <!-- Botón Editar -->
    @if (Auth::guard('employee')->user()->can('update task'))

    <a href="{{ route('task.edit', $task->id) }}"
        class="p-2 rounded-full bg-yellow-500 text-white hover:bg-yellow-700 transition duration-300" title="Edit Task">
        <i class="fa-solid fa-pen"></i>
    </a>
    @endif

    <!-- Botón Eliminar -->
    @if (Auth::guard('employee')->user()->can('delete task'))

    <button wire:click.prevent="$emit('confirmDelete', {{ $task->id }})"
        class="p-2 rounded-full bg-red-500 text-white hover:bg-red-700 transition duration-300" title="Delete Task">
        <i class="fa-solid fa-trash"></i>
    </button>
    @endif

</div>
