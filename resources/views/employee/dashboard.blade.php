<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Employee Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-8xl bg-gray-800 rounded mx-auto sm:p-6 lg:p-8">
            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6">
    
                <!-- Tareas -->
                @if (Auth::guard('employee')->user()->can('read task'))
                    <a href="{{ route('task.index') }}" 
                       class="p-6 rounded-lg shadow-md transition duration-300 flex flex-col items-center 
                              bg-gray-500 dark:bg-gray-700 text-white hover:bg-gray-700 dark:hover:bg-gray-900">
                        <i class="fa-solid fa-tasks text-4xl"></i>
                        <h3 class="mt-4 text-xl font-semibold">Tasks</h3>
                    </a>
                @endif
            
                <!-- Tarifas -->
                @if (Auth::guard('employee')->user()->can('read fee'))
                    <a href="{{ route('fee.index') }}" 
                       class="p-6 rounded-lg shadow-md transition duration-300 flex flex-col items-center 
                              bg-gray-500 dark:bg-gray-700 text-white hover:bg-gray-700 dark:hover:bg-gray-900">
                        <i class="fa-solid fa-dollar-sign text-4xl"></i>
                        <h3 class="mt-4 text-xl font-semibold">Fees</h3>
                    </a>
                @endif
            
                <!-- Empleados -->
                @if (Auth::guard('employee')->user()->can('read employee'))
                    <a href="{{ route('employee.index') }}" 
                       class="p-6 rounded-lg shadow-md transition duration-300 flex flex-col items-center 
                              bg-gray-500 dark:bg-gray-700 text-white hover:bg-gray-700 dark:hover:bg-gray-900">
                        <i class="fa-solid fa-user-tie text-4xl"></i>
                        <h3 class="mt-4 text-xl font-semibold">Employees</h3>
                    </a>
                @endif
            
                <!-- Estados -->
                @if (Auth::guard('employee')->user()->can('read status'))
                    <a href="{{ route('status.index') }}" 
                       class="p-6 rounded-lg shadow-md transition duration-300 flex flex-col items-center 
                              bg-gray-500 dark:bg-gray-700 text-white hover:bg-gray-700 dark:hover:bg-gray-900">
                        <i class="fa-solid fa-clipboard-list text-4xl"></i>
                        <h3 class="mt-4 text-xl font-semibold">Statuses</h3>
                    </a>
                @endif
            
                <!-- Roles -->
                @if (Auth::guard('employee')->user()->can('read role'))
                    <a href="{{ route('role.index') }}" 
                       class="p-6 rounded-lg shadow-md transition duration-300 flex flex-col items-center 
                              bg-gray-500 dark:bg-gray-700 text-white hover:bg-gray-700 dark:hover:bg-gray-900">
                        <i class="fa-solid fa-user-shield text-4xl"></i>
                        <h3 class="mt-4 text-xl font-semibold">Roles</h3>
                    </a>
                @endif
            
                <!-- Usuarios -->
                @if (Auth::guard('employee')->user()->can('read user'))
                    <a href="{{ route('user.index') }}" 
                       class="p-6 rounded-lg shadow-md transition duration-300 flex flex-col items-center 
                              bg-gray-500 dark:bg-gray-700 text-white hover:bg-gray-700 dark:hover:bg-gray-900">
                        <i class="fa-solid fa-users text-4xl"></i>
                        <h3 class="mt-4 text-xl font-semibold">Users</h3>
                    </a>
                @endif
            
            </div>
            
        </div>
    </div>
</x-app-layout>
