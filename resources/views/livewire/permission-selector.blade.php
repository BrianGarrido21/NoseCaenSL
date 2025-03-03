<div class="mb-4 w-full">
    <x-input-label>{{ __('Permissions') }}</x-input-label>
    <button 
        type="button" 
        wire:click="selectAll" 
        class="mb-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
    >
        {{ __('Select All') }}
    </button>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
        @foreach($permissions as $permission)
        <label class="flex items-center bg-gray-100 dark:bg-gray-800 p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700 transition">
            <input
                type="checkbox"
                name="permissions[]"
                wire:model="selectedPermissions"
                value="{{ $permission->id }}"
                class="mr-2 rounded text-blue-500 focus:ring focus:ring-blue-300 dark:focus:ring-blue-700"
            />
            <span class="text-gray-900 dark:text-gray-200">{{ ucfirst($permission->name) }}</span>
        </label>
    @endforeach
    
    </div>
</div>
