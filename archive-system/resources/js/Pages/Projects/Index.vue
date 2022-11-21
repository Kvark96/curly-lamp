<template>

    <Head title="Projects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
        </template>

        <div>
            <ProjectTable :projects="projects" />
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import ProjectTable from '@/Components/ProjectTable.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps(['projects']);
</script>

<style lang="scss" scoped>

</style>
