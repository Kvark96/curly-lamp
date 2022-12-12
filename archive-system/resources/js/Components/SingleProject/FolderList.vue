<template>
    <div class="flex justify-center px-5">
        <table class="min-w-full divide-y divide-gray-300 border">
            <thead class="bg-gray-50">
                <tr class="text-center">
                    <th scope="col" class="w-5/6 text-left px-5 py-1.5">
                        <button>Folder</button>
                    </th>
                    <th scope="col" class="w-1/6 text-left px-5">
                        <button>Entries</button>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white content-center">
                <tr v-for="folder in folders" :key="folder.id">
                    <td class="w-5/6 text-left px-5 py-1.5">
                        <button @click="$emit('show', folder)">
                            {{ folder.name }}
                        </button>
                    </td>
                    <td class="w-1/6 text-left px-5">
                        0
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
const props = defineProps(['folders']);
const folders = props.folders.outer;

</script>
