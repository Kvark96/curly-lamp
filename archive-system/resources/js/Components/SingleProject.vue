<template>
    <div class="">
        <div class="flex items-center justify-center">
            <div class="w-full px-2 py-2">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr class="text-center">
                            <h2>Project name: {{ props.project.name }}</h2>

                            <h1>The Project is: {{ props.project.status.name }}</h1>

                            <h1>Afdeling: </h1>

                            <h1>Projektejer: </h1>

                            <textarea>Information</textarea>

                                <div>
                                    <h1>FOLDERSTRUKTUR</h1>
                                </div>

                            <div class="align-middle">
                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold m-2 align-middle
                                    hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    <Link href="/projects">Upload to Project</Link>
                                </button>

                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold m-2 align-middle
                                    hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    <Link href="/projects">Delete the Project</Link>
                                </button>

                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold m-2 align-middle
                                    hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    <Link href="/projects">Go back</Link>
                                </button>

                            </div>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>




</template>

<script setup>

    import { ref, computed } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3'

    const props = defineProps(['project']);

</script>
