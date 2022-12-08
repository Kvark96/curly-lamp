<template>
    <AuthenticatedLayout>
        <div class="grid grid-cols 3">
            <div>01</div>
            <div>02</div>
            <div>03</div>
            <div>04</div>
            <div>05</div>
            <div>06</div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps(['folder_id', 'project_id']);

const form = useForm({
    'folder_id': props.folder_id,
    'project_id': props.project_id,
});

</script>
