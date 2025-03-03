<script setup>
</script>
<template>
    <div class="flex flex-col items-center justify-center min-h-screen dark:bg-gray-900  p-10">
        <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-2xl p-12 max-w-3xl text-center">
            <i class="pi pi-check-circle text-green-500 text-8xl mb-6"></i>
            <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100">
                Task Sent Successfully!
            </h2>
            <p class="text-lg text-gray-700 dark:text-gray-300 mt-4">
                Your task has been successfully registered in our system.
                <br>We will process it as soon as possible and keep you informed of its status.
            </p>

            <a :href="route('create')"
                class="px-6 py-3 mt-6 inline-block bg-gray-600 text-white font-semibold rounded-lg shadow-md transition-all hover:bg-gray-900">
                Create Another Task
            </a>
        </div>
    </div>
</template>
