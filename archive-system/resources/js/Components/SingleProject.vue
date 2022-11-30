<template>
    <div class="w-full py-10 px-10">
        <div class="md:flex md:items-center mb-6">
            <div class="w-full px-3">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr class="text-center">
                            <h2>Project name: {{ props.project.name }}</h2>

                            <h1>The Project is: {{ props.project.status.name }}</h1>

                            <h1>Afdeling: </h1>


                            <h1>Projektejer: {{ props.user.name }}</h1>

                            <textarea class="text-center">Information about the Project</textarea>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="w-full py-10 px-10">
        <div class="md:flex md:items-center mb-6">
            <div class="w-full px-3">
                <table class="min-w-full">
                    <tr class="text-center">
                        <Body>
                            <Form action="" method="post" enctype="multipart/form-data">
                                Select a File to Upload

                            <br>
                            <Input type="file"></Input>
                            </Form>
                        </Body>

                    </tr>
                </table>
            </div>
        </div>
    </div>


    <div class="w-full py-10 px-10">
        <div class="md:flex md:items-center mb-6">
            <div class="w-full px-3">
                <table class="min-w-full">
                        <tr class="text-center">
                            <div class="align-middle">
                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold m-2 align-middle
                                    hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    <Link href="/projects">Archive the Project</Link>
                                </button>

                                <button
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold m-2 align-middle
                                    hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    <Link href="/projects">Go back</Link>
                                </button>
                            </div>
                        </tr>
                </table>
            </div>
        </div>
    </div>




</template>

<script setup>

    import { ref, computed } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3'

    const props = defineProps(['user', 'project']);

</script>
