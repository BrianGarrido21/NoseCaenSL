<script setup>
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '../../Components/PrimaryButton.vue';
const props = defineProps({
    provinces: Array,
});

// Formulario vacío con valores iniciales
const form = useForm({
    cif: '',
    name: '',
    phone: '',
    email: '',
    postal_code: '',
    finish_date: '',
    province_id: '',
    status_id: 2, // Status por defecto
    address: '',
    description: '',
    pre_notes: '',
});

// Enviar formulario
const submit = () => {
    form.post(route('store'));
};
if(form.errors)
console.log(form.errors)
</script>

<template>

    <div class="m-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Create Task</h2>
            <form @submit.prevent="submit">
                <!-- Sección de dos columnas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <!-- CIF -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">CIF</label>
                        <input type="text" v-model="form.cif"
                            class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                        <p v-if="form.errors.cif" class="text-red-500 text-sm mt-1">{{ form.errors.cif }}</p>
                    </div>

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" v-model="form.name"
                            class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Phone</label>
                        <input type="text" v-model="form.phone"
                            class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                        <p v-if="form.errors.phone" class="text-red-500 text-sm mt-1">{{ form.errors.phone }}</p>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" v-model="form.email"
                            class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                    </div>

                    <!-- Fecha de finalización -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Finish Date</label>
                        <input type="datetime-local" v-model="form.finish_date"
                            class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                        <p v-if="form.errors.finish_date" class="text-red-500 text-sm mt-1">{{ form.errors.finish_date }}</p>
                    </div>

                    <!-- Selección de provincia -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Province</label>
                        <select v-model="form.province_id"
                            class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                            <option value="">Select one</option>
                            <option v-for="province in provinces" :key="province.cod" :value="province.cod">
                                {{ province.nombre }}
                            </option>
                        </select>
                        <p v-if="form.errors.province_id" class="text-red-500 text-sm mt-1">{{ form.errors.province_id }}</p>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Address</label>
                        <input type="text" v-model="form.address"
                            class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                        <p v-if="form.errors.address" class="text-red-500 text-sm mt-1">{{ form.errors.address }}</p>
                    </div>

                    <!-- Código Postal -->
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Postal Code</label>
                        <input type="text" v-model="form.postal_code"
                            class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" />
                        <p v-if="form.errors.postal_code" class="text-red-500 text-sm mt-1">{{ form.errors.postal_code }}</p>
                    </div>
                </div>

                <!-- Descripción -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Description</label>
                    <textarea v-model="form.description"
                        class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900"
                        rows="3"></textarea>
                    <p v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</p>
                </div>

                <!-- Notas previas -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Previous Notes</label>
                    <textarea v-model="form.pre_notes"
                        class="block w-full mt-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900"
                        rows="3"></textarea>
                    <p v-if="form.errors.pre_notes" class="text-red-500 text-sm mt-1">{{ form.errors.pre_notes }}</p>
                </div>

                <!-- Botón de envío -->
                <div class="flex justify-end mt-4">
                    <PrimaryButton>Create Task</PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>
