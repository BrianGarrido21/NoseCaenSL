
<template>
    <div class="card flex justify-content-center">
        <Sidebar v-model:visible="visible" header="Sidebar">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </Sidebar>
        <Button icon="pi pi-arrow-right" @click="visible = true" ></Button>
    </div>
</template>

<script setup>
    import { ref } from "vue";
    import { Button } from "primevue";
    const visible = ref(false);
</script>

<style scoped>

</style>