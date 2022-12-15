<template>
    <ProjectInformationCard :project="project" :user="user"/>

    <ProjectFoldersCard :folders="folders"/>

    <div class="flex-justify-center">
        <div class="w-full py-10 px-10">
            <div class="md:flex md:items-center mb-6">
                <div class="w-full px-3">
                </div>
            </div>
        </div>

        <div class="w-full py-10 px-10">
            <div class="md:flex md:items-center mb-6">
                <div class="w-full px-3">
                    <table class="min-w-full">
                            <tr class="text-center">
                                <div class="align-middle">
                                    <button
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold m-2 align-middle
                                        hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        <Link href="/projects">Edit the Project</Link>
                                    </button>

                                    <button
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold m-2 align-middle
                                        hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        <Link href="/projects">Go back</Link>
                                    </button>
                                </div>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



</template>

<script setup>
    import ProjectInformationCard from './ProjectInformationCard.vue';
    import ProjectFoldersCard from './ProjectFoldersCard.vue';
    import { Link } from '@inertiajs/inertia-vue3'

    const props = defineProps(['user', 'project', 'folders']);

    const project = props.project;
    const user = props.user;
    const folders = props.folders;

</script>
