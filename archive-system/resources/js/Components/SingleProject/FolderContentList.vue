<template>
    <div class="w-full px-2 py-4">
        <div class="max-w-full overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-300 ">
                <thead class="bg-gray-50">
                    <tr class="text-center">
                        <th scope="col" class="w-1/6">
                            <button @click="sortBy('id')">Date</button>
                        </th>
                        <th scope="col" class="w-1/3">
                            <button @click="sortBy('link')">{{ header }}</button>
                        </th>
                        <th scope="col" class="w-1/2">
                            <button @click="sortBy('description')"> Description </button>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white content-center">
                    <tr v-for="link in sortedList" :key="link.id">
                        <td class="w-1/6">
                            {{ readableCreationDate(link) }}
                        </td>
                        <td class="w-1/3">
                            {{ getPathOrUrl(link) }}
                        </td>
                        <td class="text-left w-1/2">
                            {{ link.description }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { orderBy, filter } from 'lodash'


const props = defineProps(['type', 'list']);

const sortedBy = ref(['name'])
const dir = ref(['asc']);
const query = ref("");

const sortedList = computed(() => {
    let afterSearch = searchList(props.list);
    return orderBy(afterSearch, sortedBy.value, dir.value);
});

const header = computed(() => {
    if(props.type == 'file') return 'path';
    return 'url';
});

function searchList(list) {
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

function readableCreationDate(item) {
    return new Date(item.created_at).toLocaleDateString();
};

function getPathOrUrl(item) {
    if(props.type == 'file') return item.path;
    return item.url;
}

</script>

