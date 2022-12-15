<template>
    <form @submit.prevent="form.post(route('files.store'))">
        <div class="grid grid-cols-3 grid-rows-3 w-full px-5 border border-slate-400 rounded bg-slate-300">
            <div class="py-4">
                <input @input="form.file = $event.target.files[0]" class="text-sm" type="file" id="file" placeholder="">
                <div v-if="$page.props.errors.file" class="text-red-600 text-sm font-bold">
                    {{ $page.props.errors.file }}
                </div>
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
            </div>
            <div>
                <!-- Empty, for spacing purposes :) -->
            </div>
            <div class="py-2 text-right text-sm">
                <button
                    class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                    type="submit" id="submit"
                    :disabled="form.processing">
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
    file: null,
    description: null,
    folder: props.folder,
});



</script>
