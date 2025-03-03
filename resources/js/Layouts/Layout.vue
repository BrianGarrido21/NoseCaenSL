<template>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col">
            <div class="flex-1">
                <navigation class="text-white" />
                <main>
                    <slot />
                    <Footer />
                </main>
            </div>
        </div>
    </body>
</template>

<script setup>
import navigation from '../Components/navigation.vue';
import Footer from '../Components/Footer.vue';
</script>
<style scoped>
</style>