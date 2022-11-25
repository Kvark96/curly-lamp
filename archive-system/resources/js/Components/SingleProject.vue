<template>
    <div class="">
        <div class="flex items-center justify-center">
            <div class="w-full px-2 py-4">

                <h1>{{ props.project.name }}</h1>

                <h1>Status</h1>

                <h1>Afdeling</h1>

                <h1>Information</h1>

                <h1>Upload</h1>

                <h1>Delete</h1>

                    <button
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold m-2 align-middle
                        hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        <Link href="/projects">Go back</Link>
                    </button>

            </div>
        </div>
    </div>




</template>

<script setup>

    import { ref, computed } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3'

    const props = defineProps(['project']);

</script>
