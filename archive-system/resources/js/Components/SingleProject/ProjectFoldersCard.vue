<template>
    <div class="w-full px-5">
        <div class="grid grid-cols-3 gap-4 border border-black">
            <div class="" v-for="folder in folders" :key="folder.id">
                01
            </div>
            <div class="border border-black">02</div>
            <div class="border border-black">03</div>
            <div class="border border-black">04</div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(['folders']);
const folders = props.folders;
console.log(folders);
</script>
