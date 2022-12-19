<template>
    <div>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-2">
                <div class=" py-1.5 text-right">
                    <input v-model="form.name" class="rounded h-10 w-96" type="text" placeholder="Folder name ..." maxlength="255"/>
                    <div v-if="success">Folder was created!</div>
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>

                <div class=" py-1.5 px-20 flex justify-left">
                    <button @click="submit"
                        class="h-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                        Save
                    </button>
                    <div class="px-1"></div>
                    <button @click="$emit('cancel')"
                        class="h-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white px-5 py-1.5 border border-blue-500 hover:border-transparent rounded">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps(['project', 'parentId']);
const success = ref(false);

const form = useForm({
    name: null,
    parent_id: null,
    type: null,
    project_id: props.project.id,
});

function submit() {
    if (props.parentId) {
        form.parent_id = props.parentId;
        form.type = 'inner';
    } else {
        form.type = 'outer';
    }

    form.post(route('folders.store'), {
        onSuccess: () => {
            form.reset();
            success.value = true;
        }
    });
}

</script>
