<template>
    <div v-if="folder" class="py-5 py-5 bg-slate-200 border border-slate-200 rounded">
        <!-- HEADER -->
        <div class="text-2xl font-bold text-gray-700 bg-slate-300 py-2">
            {{ folder.name }}
        </div>
        <div class="">
            <!-- BODY -->
            <FolderContentList
                class="px-5"
                type="file"
                :list="files"
            />

            <FolderContentList
            class="px-5"
            type="link"
            :list="links"
            />
        </div>
    </div>
</template>

<script setup>
import FolderContentList from './FolderContentList.vue';

const props = defineProps(['folder']);
const folder = props.folder;

const files = folder.files;
const links = folder.links;

console.log(folder);

</script>
