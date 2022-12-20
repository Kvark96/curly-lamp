<template>
    <div class="w-full px-5 py-5">
        <form @submit.prevent="form.put(route('project.update', props.project.id))">
            <div class="rounded bg-slate-200 grid grid-cols-3 gap-4 text-center py-5 px-5">
                <div class="col-span-2 text-left tracking-wide text-xl font-bold w-full">
                    <div class="text-gray-700 rounded border border-">
                        <input class="w-full" type="text" v-model="form.name" />
                    </div>
                </div>
                <div class="text-sm border-black text-gray-700">
                    {{ readableCreationDate }}
                </div>
                <div class="text-left border-black text-gray-700">
                    Status:
                    <select class="rounded" v-model="form.status_id">
                        <option v-for="status in props.allStatus" :value="status.id">
                            {{ status.name }}
                        </option>
                    </select>
                </div>
                <div></div>
                <div class="text-gray-700">
                    Leader:
                    <select class="rounded" v-model="form.leader_id">
                        <option v-for="leader in props.leaders" :value="leader.id">
                            {{ leader.name }}
                        </option>
                    </select>
                </div>
                <div class="col-span-3 text-left bg-slate-300 rounded px-2 py-2">
                    <textarea class="px-2 h-48 w-full resize-none rounded" v-model="form.description" />
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-slate-200 text-white font-semibold hover:text-blue-700 px-5 py-1.5 border border-blue-500 rounded">
                    Save
                </button>
                <Link as="button" :href="route('project', props.project.id)"
                class="bg-slate-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                    Back
                </Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['project', 'leaders', 'allStatus']);

let readableCreationDate = new Date(props.project.created_at).toLocaleDateString();

const form = useForm({
    project_id: props.project.id,
    name: props.project.name,
    status_id: props.project.status.id,
    leader_id: props.project.leader_id,
    description: props.project.description,
});


</script>
