<template>

    <Head title="Projects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add new project
            </h2>
        </template>

        <div>
            <NewProject :leaders="leaders" :statuses="statuses"/>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import NewProject from '@/Components/NewProject.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps(['leaders', 'statuses']);

</script>

<style lang="scss" scoped>

</style>

