<div x-data="{ showModal: @entangle('showModal').defer }">
    <!-- Overlay oscuro -->
    <div x-show="showModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40" x-cloak></div>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Confirm Delete</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">
                Are you sure you want to delete this user? This action cannot be undone.
            </p>

            <div class="mt-4 flex justify-end space-x-2">
                <!-- Cancelar -->
                <button @click="showModal = false" wire:click="resetModal"
                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                    Cancel
                </button>
                
                <!-- Confirmar Eliminación -->
                <button wire:click="deleteUser"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>
