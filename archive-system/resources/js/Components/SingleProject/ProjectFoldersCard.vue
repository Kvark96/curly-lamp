<template>
    <div class="w-full px-5">
        <FolderList v-if="outerVisible" @show="showInner" :folders="folders"/>
        <FolderSubList v-if="innerVisible" @show="showContents" :folders="folders" :parent="currentFolder"/>
        <div class="flex justify-center py-5">
            <button v-if="outerVisible" class="w-1/6 py-2 bg-blue-500 text-white font-semibold align-middle border border-transparent rounded">
                <Link href="/projects">Back</Link>
            </button>
            <button v-if="innerVisible" @click="reset" class="w-1/6 py-2 bg-blue-500 text-white font-semibold align-middle border border-transparent rounded">
                Back
            </button>
        </div>

        <div v-if="!outerVisible && !innerVisible" class="grid grid-cols-1 text-center border">
            <FolderContents :folder="this.currentFolder"/>
            <div class="flex justify-center py-5">
                <button @click="reset"
                class="w-1/6 py-2 bg-blue-500 text-white font-semibold align-middle border border-transparent rounded">
                    Back to Project
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import FolderContents from './FolderContents.vue';
import FolderSubList from './FolderSubList.vue';
import FolderList from './FolderList.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['folders']);
const folders = props.folders;

const outerVisible = ref(true);
const innerVisible = ref(false);
const currentFolder = ref(null);
const emit = defineEmits(['enter']);

function showInner(folder)
{
    outerVisible.value = !outerVisible.value;
    innerVisible.value = !innerVisible.value;
    currentFolder.value = folder;
    emit('enter', folder.id);
}

function showContents(folder)
{
    innerVisible.value = !innerVisible.value;
    currentFolder.value = folder;
}

function reset()
{
    outerVisible.value = true;
    innerVisible.value = false;
}

</script>
