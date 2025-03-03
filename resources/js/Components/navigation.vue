<template>
    <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                

                <!-- Logo -->
                <div class="shrink-0">
                    <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </div>

                <!-- Navegación -->
                <div class="flex space-x-6">
                    <NavLink :href="route('home')" :active="route().current('home')">
                        Home
                    </NavLink>

            
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import ApplicationLogo from './application-logo.vue';
import NavLink from './nav-link.vue';
</script>

<style scoped>
</style>
