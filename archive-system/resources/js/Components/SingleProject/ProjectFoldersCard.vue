<template>
    <div class="w-full px-5">
        <div v-if="!inside" class="grid grid-cols-3 gap-4 text-center">
            <div class="" v-for="folder in folders" :key="folder.id">
                <button @click="showContents(folder)" class="w-full bg-blue-500 text-white text-4xl font-semibold align-middle py-10 border border-transparent rounded">
                    {{ folder.name }}
                </button>
            </div>
        </div>
        <div v-else class="grid grid-cols-1 text-center border">
            <FolderContents :folder="this.currentFolder"/>
            <button @click="showContents(null)"
            class="w-1/6 py-2 bg-blue-500 text-white font-semibold align-middle border border-transparent rounded">
                fuck go back
            </button>
        </div>
    </div>
</template>

<script setup>
import FolderContents from './FolderContents.vue';
import { ref } from 'vue';
const props = defineProps(['folders']);
const folders = props.folders;

const inside = ref(false);
const currentFolder = ref(null);

function showContents(folder)
{
    inside.value = !inside.value;
    currentFolder.value = folder;
}

</script>
