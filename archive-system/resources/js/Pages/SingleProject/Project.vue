<template>
    <div>

        <Head :title="project.name" />

        <AuthenticatedLayout>
            <ProjectInformationCard :project="project"/>
            <div v-if="!isEditing()">
                <div v-if="($page.props.auth.user.type_id !== 3)" class="grid grid-cols-4 text-center rounded">
                    <div>
                        <button @click="toggleEditing('project')"
                            class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                            Edit Project
                        </button>
                    </div>
                    <div>
                        <!-- ~ spacing ~ -->
                    </div>
                    <div>
                        <button @click="toggleEditing('folder')"
                            class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                            Add folder
                        </button>
                    </div>
                    <div>
                        <button @click="toggleEditing('users')"
                            class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                            Add users
                        </button>
                    </div>
                </div>
                <ProjectFoldersCard :folders="folders" @enter="(id) => setParent(id)" class="py-5" />
            </div>

            <ProjectEdit v-if="editingProject" @cancel="back" :project="project" :leaders="props.allLeaders" :allStatus="props.allStatus"/>
            <ProjectAddFolder v-if="addingFolder" @cancel="back" :project="project" :parentId="parent" />
            <ProjectAddUsers v-if="addingUsers" @cancel="back" :users="users" :project="project" :currentUsers="props.currentUsers"/>

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
import ProjectEdit from '@/Components/SingleProject/ProjectEdit.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps(['project', 'folders', 'users','currentUsers', 'allLeaders', 'allStatus']);

const addingFolder = ref(false);
const addingUsers = ref(false);
const editingProject = ref(false);

const project = props.project;
const folders = props.folders;
const users = props.users;
const parent = ref(null);

function toggleEditing(type) {
    if (type == 'folder') addingFolder.value = !addingFolder.value;
    if (type == 'users') addingUsers.value = !addingUsers.value;
    if (type == 'project') editingProject.value = !editingProject.value;
}

function isEditing() {
    return (addingFolder.value || addingUsers.value || editingProject.value);
}

function back() {
    addingFolder.value = false;
    addingUsers.value = false;
    editingProject.value = false;
}

function setParent(folder_id) {
    parent.value = folder_id;
}

</script>


<style lang="scss" scoped>

</style>
