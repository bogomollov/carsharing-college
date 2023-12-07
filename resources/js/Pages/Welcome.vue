<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Главная" />
        <div v-if="canLogin">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >
            <template v-else>
                <div class="min-h-screen bg-gray-100 min-w-screen">
                    <header class="w-full text-gray-700 border-gray-100 shadow-sm header">
                        <div class="flex items-center justify-between p-5 mx-auto md:flex-row">
                            <nav class="flex items-center justify-center text-base border-gray-200 mx-auto">
                                <a class="items-center mb-4 font-medium text-gray-900 md:mb-0 header-img">
                                    <img src="./images/logo.png" width="70" height="60"/>
                                </a>
                                <a href="#_" class="header-tarif font-medium hover:text-gray-900">Тарифы</a>
                                <a href="#_" class="pl-5 font-medium hover:text-gray-900">Контакты</a>
                                <div class="items-center h-full account">
                                    <Link :href="route('login')" class="pr-5 font-medium hover:text-gray-900">Авторизация</Link>
                                    <Link v-if="canRegister" :href="route('register')" class="header-button px-4 py-2 font-medium text-white transition-all duration-150 rounded shadow outline-none hover:shadow-md focus:outline-none ease">
                                        Регистрация</Link>
                            </div>
                            </nav>
                        </div>
                    </header>
                </div>
            </template>
        </div>
</template>
<style>
.header {
    background-color: #F7FAFC;
}
.header-tarif {
    padding-left: 25px;
}
.header-button {
    background-color: #4FC3F7;
}
.account {
    padding-left: 1000px;
}
</style>
