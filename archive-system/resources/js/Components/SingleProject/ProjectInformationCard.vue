<template>
    <div class="w-full px-5 py-5">
        <div class=" rounded bg-slate-200 grid grid-cols-3 gap-4 text-center py-5 px-5">
            <div class="text-left block tracking-wide text-xl text-gray-700 font-bold">
                <h1>{{ project.name }}</h1>
            </div>
            <div class=" border-black">

            </div>
            <div class="text-sm border-black text-gray-700"> {{ readableCreationDate }} </div>
            <div class="text-left border-black text-gray-700"> Status: {{ project.status.name }}</div>
            <div class=" border-black"></div>
            <div class=" border-black text-gray-700">Leader: {{ project.leader.name }}</div>
            <div class="col-span-3 text-left bg-slate-300 rounded px-2 py-2">
                <!-- <p class="block uppercase tracking-wide text-gray-700 text-xs px-2 font-bold mb-2">Description</p> -->
                <p class="px-2">
                    {{ project.description }}
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(['project']);

let project = props.project;

let readableCreationDate = new Date(project.created_at).toLocaleDateString();

</script>

<!--
    Project Name
    Department
    Status
    Project Owner
    Description
 -->
