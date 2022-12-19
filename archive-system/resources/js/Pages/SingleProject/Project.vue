<template>
    <div>

        <Head :title="project.name" />

        <AuthenticatedLayout>
            <ProjectInformationCard :project="project" :user="leader" />
            <div v-if="!isAdding()">
                <div v-if="($page.props.auth.user.type_id !== 3)"
                    class="grid grid-cols-4 text-center rounded">
                    <div>
                        <button
                            class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                            Edit Project
                        </button>
                    </div>
                    <div>
                        <!-- ~ spacing ~ -->
                    </div>
                    <div>
                        <button
                        @click="toggleAdding('folder')"
                        class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                        Add folder
                    </button>
                </div>
                <div>
                    <button
                    @click="toggleAdding('users')"
                            class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                            Add users
                        </button>
                    </div>
                </div>
                <ProjectFoldersCard :folders="folders" />
            </div>

            <ProjectAddFolder v-if="addingFolder" @cancel="back" :project="project"/>
            <ProjectAddUsers v-if="addingUsers" @cancel="back" :users="users" :project="project" />

        </AuthenticatedLayout>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ProjectAddFolder from '@/Components/SingleProject/ProjectAddFolder.vue'
import ProjectAddUsers from '@/Components/SingleProject/ProjectAddUsers.vue';
import ProjectInformationCard from '@/Components/SingleProject/ProjectInformationCard.vue';
import ProjectFoldersCard from '@/Components/SingleProject/ProjectFoldersCard.vue';
import { Inertia } from '@inertiajs/inertia';

Inertia.reload({ only: ['users', 'folders']});
const props = defineProps(['leader', 'project', 'folders', 'users']);

const addingFolder = ref(false);
const addingUsers = ref(false);
const project = props.project;
const leader = props.leader;
const folders = props.folders;
const users = props.users;

console.log(isAdding());

function toggleAdding(type) {
    if(type == 'folder') addingFolder.value = !addingFolder.value;
    if(type == 'users') addingUsers.value = !addingUsers.value;
}

function isAdding() {
    return (addingFolder.value || addingUsers.value);
}

function back() {
    addingFolder.value = false;
    addingUsers.value = false;
}
</script>


<style lang="scss" scoped>

</style>
