<template>
    <div class="w-full py-10 px-10">
        <div class="md:flex md:items-center mb-6">
            <form @submit.prevent="submit" class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            Project Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="name" placeholder="Cool Guy, LLC" v-model="form.name">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-state">
                            Leader
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="leader" v-model="form.leader">
                                <option v-for="leader in props.leaders" :key="leader.id">{{ leader.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Status
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="status" v-model="form.status">
                                <option v-for="status in props.statuses" :key="status.id">{{ status.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" id="submit"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                        :disabled="form.processing">
                        Create Project
                    </button>
                    <Link href="/projects"
                        class="inline-block align-baseline font-bold text-blue-500 hover:text-blue-800 py-2"> Cancel
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps(['leaders', 'statuses']);

const form = useForm({
    leader: props.leaders[0].name,
    name: null,
    status: props.statuses[0].name,
})

// TODO: Figure this out
// form.defaults({
//     leader: 'Oliver',
//     status: 'active'
// });

function submit() {
    console.log(form)
}

</script>

<style>

</style>
