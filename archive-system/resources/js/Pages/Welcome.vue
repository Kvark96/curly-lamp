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
                <button class="bg-transparent hover:bg-cyan-600 text-cyan-600 font-semibold m-2 hover:text-white
                    py-1 px-1 border border-cyan-600 hover:border-transparent rounded"><Link :href="route('login')">Log in</Link></button>
                <button v-if="canRegister" class="bg-transparent hover:bg-cyan-900 text-cyan-900 font-semibold m-2 hover:text-white
                    py-1 px-1 border border-cyan-900 hover:border-transparent rounded"><Link :href="route('register')">Register</Link></button>
            </div>
        </div>

</template>
