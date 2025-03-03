<div class="flex space-x-2">
    <!-- Botón Ver -->
    @if (Auth::guard('employee')->user()->can('read employee'))
        <a href="{{ route('employee.show', $employee->id) }}"
            class="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-700 transition duration-300" title="View Employee">
            <i class="fa-solid fa-eye"></i>
        </a>
    @endif

    <!-- Botón Editar -->
    @if (Auth::guard('employee')->user()->can('update employee'))
        <a href="{{ route('employee.edit', $employee->id) }}"
            class="p-2 rounded-full bg-yellow-500 text-white hover:bg-yellow-700 transition duration-300" title="Edit Employee">
            <i class="fa-solid fa-pen"></i>
        </a>
    @endif

    <!-- Botón Eliminar -->
    @if (Auth::guard('employee')->user()->can('delete employee'))
    <button wire:click.prevent="$emit('confirmDelete', {{ $employee->id }})"
        class="p-2 rounded-full bg-red-500 text-white hover:bg-red-700 transition duration-300" title="Delete Employee">
        <i class="fa-solid fa-trash"></i>
    </button>
    
    @endif
</div>
