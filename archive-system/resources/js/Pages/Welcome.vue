<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})

</script>

<template>

    <Head title="Welcome" />
        <div v-if="$page.props.auth.user"></div>
        <div v-else class="fixed inset-1/4">
            <img class="object-scale-down h-120 w-240" src="../../assets/SDC_logo_rgb.png" />
        </div>

        <div v-if="canLogin">
            <Link v-if="$page.props.auth.user" :href="route('projects.index')"
            class="fixed inset-1/4">
            <img src="../../assets/SDC_logo_rgb.png"
            />
            </Link>

            <div v-else class="fixed inset-x-1/3 px-52 py-40">
                <Link :href="route('login')" class="text-xl text-cyan-600 underline">Log in</Link>
                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-xl text-cyan-900 underline">Register</Link>
            </div>
        </div>

</template>
