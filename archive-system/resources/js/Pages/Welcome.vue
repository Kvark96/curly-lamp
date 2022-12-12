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

        <div>
            <img class="object-scale-down h-120 w-240" src="../../assets/SDC_logo_rgb.png" />
        </div>

        <div v-if="canLogin">
            <div class="grid grid-cols-2 w-full">
                <div class="col-span-2" v-if="$page.props.auth.user">
                    <Link :href="route('projects.index')" class="fixed inset-1/4">
                    <img src="../../assets/SDC_logo_rgb.png" />
                    </Link>
                </div>

                <div v-else class="col-span-2 flex justify-center py-10">

                    <Link :href="route('login')" as="button" type="button" class="w-1/3 bg-transparent hover:bg-cyan-600 text-cyan-600 font-semibold m-2 hover:text-white
                    py-1 px-1 border border-cyan-600 hover:border-transparent rounded">Log in</Link>


                    <Link v-if="canRegister" :href="route('register')" as="button" type="button" class="w-1/3 bg-transparent hover:bg-cyan-900 text-cyan-900 font-semibold m-2 hover:text-white
                py-1 px-1 border border-cyan-900 hover:border-transparent rounded">Register</Link>


                </div>
            </div>
        </div>
    </div>

</template>
