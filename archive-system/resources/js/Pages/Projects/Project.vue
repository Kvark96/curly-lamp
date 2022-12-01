<template>

    <Head title="Project + name" />

        <AuthenticatedLayout>

            <div>
                <SingleProject :project="project" :user="user"/>
            </div>

        </AuthenticatedLayout>


</template>

<script setup>

import SingleProject from '@/Components/SingleProject/SingleProject.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps(['project', 'user']);

</script>


<style lang="scss" scoped>

</style>
