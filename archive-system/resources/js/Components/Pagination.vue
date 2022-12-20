<template>
    <div>
        <div class="flex flex-wrap -mb-1">
            <template v-for="(page, key) in list">
                <button
                    @click="$emit('change', key)"
                    class="
                        px-4
                        py-3
                        mb-1
                        mr-1
                        text-sm
                        leading-4
                        border
                        rounded
                        hover:bg-white
                        focus:border-indigo-500 focus:text-indigo-500
                    "
                    :class="{ 'bg-white': key === current }"
                    v-html="key+1"
                />
            </template>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
const props = defineProps(['list', 'current']);
const list = props.list;
const current = props.current;

</script>
