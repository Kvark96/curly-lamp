<template>
    <div class="">
        <div class="flex flex-wrap">
            <div class="w-full px-2 py-4">
                <div class="max-w-full overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr class="text-center">
                                <th scope="col" class="px-10 text-left w-40">
                                    id
                                </th>
                                <th scope="col" class="text-left w-100">
                                    Project
                                </th>
                                <th scope="col" class="text-left">
                                    Status
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
                                        <a href="#"> Gå til projekt </a>
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
    import { ref, computed } from 'vue'

    const props = defineProps(['projects']);

    const sortedProjects = computed(() => {
        return props.projects;
    });

</script>
