<template>
    <div>
        <div v-if="folder" class="py-5 py-5 bg-slate-200 border border-slate-200 rounded">
            <div class="text-2xl font-bold text-gray-700 bg-slate-300 py-2">
                {{ folder.name }}
            </div>
            <div class="">
                <!-- Files -->
                <FolderContentList v-if="!isAddingFile" class="px-5" type="file" :list="files" />

                <div v-if="isAddingFile" class="flex justify-center">
                    <FolderAddFile class="w-96" @cancel="toggleForms('file')" :folder="folder"/>
                </div>

                <div v-else="">
                    <button @click="toggleForms('file')" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Add File </button>
                </div>

                <!-- Links -->
                <FolderContentList v-if="!isAddingLink" class="px-5" type="link" :list="links" />
                <div v-if="isAddingLink" class="flex justify-center">
                    <FolderAddLink class="w-96" @cancel="toggleForms('link')" :folder="folder"/>
                </div>
                <button v-else="" @click="toggleForms('link')" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"> Add Link </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import FolderContentList from './FolderContentList.vue';
import FolderAddFile from './FolderAddFile.vue';
import FolderAddLink from './FolderAddLink.vue';

const props = defineProps(['folder']);

const folder = props.folder;
const files = folder.files;
const links = folder.links;

const isAddingFile = ref(false);
const isAddingLink = ref(false);

function toggleForms(entityType){
    if(entityType == 'file') {
        isAddingFile.value = !isAddingFile.value;
    } else if(entityType == 'link') {
        isAddingLink.value = !isAddingLink.value;
    }
}
</script>
