<template>
    <div class="">
        <div class="flex flex-wrap">
            <div class="w-full px-2 py-2 flex justify-between">
                <div v-if="($page.props.auth.user.type_id !== 3 )">
                    <button
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        <Link href="projects/add"> Tilføj nyt projekt </Link>
                    </button>
                </div>
                <div class="input-group relative flex flex-wrap items-stretch">
                    <input type="text" v-model="query" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search"/>
                </div>
            </div>
            <div class="w-full px-2 py-4">
                <div class="max-w-full overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr class="text-center">
                                <th scope="col" class="px-10 text-left w-40">
                                    <button @click="sortBy('id')">id</button>
                                </th>
                                <th scope="col" class="text-left w-100">
                                    <button @click="sortBy('name')">Project</button>
                                </th>
                                <th scope="col" class="text-left">
                                    <button @click="sortBy('status.name')">Status</button>
                                </th>
                                <th scope="col" class="text-left">
                                    Link
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white content-center">
                            <tr v-for="project in sortedProjects" :key="project.id">
                                <td class="px-10 text-left w-40">
                                    {{ project.id }}
                                </td>
                                <td class="text-left">
                                    {{ project.name }}
                                </td>
                                <td class="text-left">
                                    {{ project.status.name }}
                                </td>
                                <td class="text-left">

                                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        <a :href="'project/' + project.id" :project='project'>Go to Project</a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ref, computed } from 'vue'
import { orderBy, filter } from 'lodash'

const query = ref("");

const props = defineProps(['projects']);
const sortedBy = ref(['status.name']);
const dir = ref(['asc']);

const sortedProjects = computed(() => {
    let afterSearch = searchProjects(props.projects);
    return orderBy(afterSearch, sortedBy.value, dir.value);
});

function searchProjects(list) {
    if (query.value != "") {
        let result = filter(list, (elm) => {
            return elm.name.toLowerCase().includes(query.value.toLowerCase());
        });

        return result;
    } else {
        return list;
    }
}

function sortBy(sort) {
    // If the header is clicked twice change the direction, default to asc.
    if (sortedBy.value == sort) {
        changeDir();
    } else {
        dir.value = 'asc';
    }

    sortedBy.value = sort;
}

// Changes the order-direction.
function changeDir() {
    if (dir.value == 'asc') {
        dir.value = 'desc';
    } else {
        dir.value = 'asc';
    }
}

</script>
