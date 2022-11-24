<template>

    <Head title="Project + name" />

        <AuthenticatedLayout>

            <div>
                <SingleProject :project="project" />
            </div>

        </AuthenticatedLayout>


</template>

<script setup>

import SingleProject from '@/Components/SingleProject.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps(['project']);

</script>


<style lang="scss" scoped>

</style>
