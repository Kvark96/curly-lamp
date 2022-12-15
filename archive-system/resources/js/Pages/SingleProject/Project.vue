<template>
    <div>

        <Head :title="project.name" />

        <AuthenticatedLayout>
            <ProjectInformationCard :project="project" :user="user" />

            <ProjectFoldersCard :folders="folders" />

            <div class="flex-justify-center">
                <div class="w-full py-10 px-10">
                    <div class="md:flex md:items-center mb-6">
                        <div class="w-full px-3">
                        </div>
                    </div>
                </div>
            </div>


        </AuthenticatedLayout>


    </div>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

import ProjectInformationCard from '@/Components/SingleProject/ProjectInformationCard.vue';
import ProjectFoldersCard from '@/Components/SingleProject/ProjectFoldersCard.vue';

const props = defineProps(['user', 'project', 'folders']);

const project = props.project;
const user = props.user;
const folders = props.folders;
</script>


<style lang="scss" scoped>

</style>
