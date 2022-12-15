<template>
    <form @submit.prevent="form.post(route('links.store'))">
        <div class="grid grid-cols-3 grid-rows-3 w-full px-5 border border-slate-400 rounded bg-slate-300">
            <div class="py-4">
                <input type="text"
                    class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="URL" v-model="form.url" />
                <div v-if="$page.props.errors.url" class="text-red-600 text-sm font-bold">
                    {{ $page.props.errors.url }}
                </div>
            </div>
            <div>
                <!-- Empty, for spacing purposes :) -->
            </div>
            <div class="py-2 text-right text-sm">
                <button
                    class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    type="submit" id="submit">
                    Save
                </button>
                <button @click="$emit('cancel')"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Cancel
                </button>
            </div>
            <div class="col-span-3 py-1.5 row-span-2">
                <textarea id="description" v-model="form.description" class="w-full h-full resize-none" type="text"
                    placeholder="Description ..." />
                <div v-if="$page.props.errors.description" class="text-red-600 text-sm font-bold">
                    {{ $page.props.errors.description }}
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps(['folder', 'errors']);

const form = useForm({
    url: null,
    description: null,
    folder: props.folder
});

</script>
