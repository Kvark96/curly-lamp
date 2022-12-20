<template>
    <div class="w-full">
        <div class="flex justify-between bg-slate-300 py-1.5 px-5">
            <div class="font-bold text-l py-1.5 px-5 bg-slate-300">Users</div>
            <div class="bg-slate-300 text-left"><input class="text-sm rounded" v-model="query" type="text"
                    placeholder="Search ..." /></div>
        </div>
        <div class="px-5">
            <table class="w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr class="text-left">
                        <th class="w-1/6">id</th>
                        <th class="w-2/6">Name</th>
                        <th class="w-2/6">Email</th>
                        <th class="w-1/6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white content-center">
                    <tr v-for="user in props.users[currentPage]" :key="user.id">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <button @click="addUser(user)"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-1 border border-blue-500 hover:border-transparent rounded">
                                Add
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination @change="(key) => goToPage(key)" :list="props.users" :current="currentPage" class="flex justify-center"/>

            <div v-if="(selectedUsers[currentCurrentPage].length != 0)">
                <div class="py-1.5 font-bold text-sm">
                    Current users
                </div>
                <table class="w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr class="text-left">
                            <th class="w-1/6">id</th>
                            <th class="w-2/6">Name</th>
                            <th class="w-2/6">Email</th>
                            <th class="w-1/6"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white content-center">
                        <tr v-for="user in selectedUsers[0]" :key="user.id">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <button @click="removeUser(user)"
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-1 border border-blue-500 hover:border-transparent rounded">
                                    Remove
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="w-full flex justify-center py-5">
                    <form @submit.prevent="form.post(route('project.addusers'))">
                        <button type="submit"
                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                            Save
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-full py-5 flex justify-center">
                <button @click="$emit('cancel')"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                    Back
                </button>
            </div>
            <div class="py-20"></div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';

const query = ref('');
const props = defineProps(['users', 'project', 'currentUsers']);
const selectedUsers = ref(props.currentUsers);
const currentPage = ref(0);

// :)
const currentCurrentPage = ref(0);

const form = useForm({
    users: selectedUsers.value,
    project: props.project,
});

function addUser(user) {
    selectedUsers.value[selectedUsers.value.length - 1].push(user);
}

function removeUser(user) {
    let index = findUser(user.id);
    if (index != -1) {
        selectedUsers.value[currentCurrentPage.value].splice(index, 1);
    }
}

function customSearch() {
    q = query.value.toLowerCase();
    console.log(q);
}

function findUser(id) {
    console.log(selectedUsers.value);
    for (let i = 0; i < selectedUsers.value[currentCurrentPage.value].length; i++) {
        console.log(selectedUsers.value[currentCurrentPage.value][i].id + ' == ' + id )
        if (selectedUsers.value[currentCurrentPage.value][i].id == id) return i;
    }
    return -1;
}

function goToCurrent(pageNo) {
    currentCurrentPage.value = pageNo;
}

function goToPage(pageNo) {
    currentPage.value = pageNo;
}

</script>
