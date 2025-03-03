<template>
    <div class="min-h-screen flex flex-col items-center justify-center text-center px-6">
        <div class="hover:animate-bounce">
            <i class="fa-brands fa-pied-piper-hat fa-8x mb-5  animate-fade-in "></i>
        </div>
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 animate-fade-in">
            Welcome to NoSeCaen SL
        </h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6 max-w-2xl animate-fade-in delay-100">
            Discover a smooth and modern experience with the best tools to manage your business.
        </p>

        <a :href="route('create')"
            class="px-6 py-3 mt-2 inline-block bg-gray-600 text-white font-semibold rounded-lg shadow-md transition-all animate-fade-in hover:bg-gray-800">
            Create Task
        </a>
    </div>
</template>


<script setup>

</script>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 2s ease-out;
}
</style>