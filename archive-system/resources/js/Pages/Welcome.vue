<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import SDCLogo from '../../assets/SDClogo.png';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})

</script>

<template>
    <Head title="Welcome" />

        <div class="grid place-items-center h-screen">
            <div class="hidden fixed top-25 px-6 py-4 sm:block">
                    PICTURE LOADING :)
            </div>
        </div>

    <div class="grid place-items-center h-screen">
        <div v-if="canLogin" class="hidden fixed top-10 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-xl text-lime-700 dark:text-lime-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-xl text-lime-700 dark:text-lime-500 underline">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-xl text-lime-700 dark:text-lime-500 underline">Register</Link>
            </template>
        </div>


    </div>
</template>
