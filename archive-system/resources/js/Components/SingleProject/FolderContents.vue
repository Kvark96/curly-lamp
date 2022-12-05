<template>
    <div v-if="folder">
        {{ folder.id }}<br/>
        {{ folder.name }}
    </div>
</template>

<script setup>

const props = defineProps(['folder']);
const folder = props.folder;
console.log(folder);

</script>
