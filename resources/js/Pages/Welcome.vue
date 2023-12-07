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
                <div class="min-h-screen bg-gray-100 min-w-screen text-gray-700">
                    <header class="w-full border-gray-100 shadow-sm header">
                        <div class="flex items-center justify-between p-5 mx-auto md:flex-row">
                            <nav class="flex font-normal items-center justify-center text-lg mx-auto">
                                <a class="items-center text-gray-900 md:mb-0 header-img">
                                    <img src="./images/logo.png" width="70" height="60"/>
                                </a>
                                <a href="#_" class="hover:text-gray-900 header-tarif">Тарифы</a>
                                <a href="#_" class="pl-5 hover:text-gray-900">Контакты</a>
                                <div class="items-center h-full account">
                                    <Link :href="route('login')" class="pr-5 hover:text-gray-900">Авторизация</Link>
                                    <Link v-if="canRegister" :href="route('register')" class="px-4 py-2 text-white transition-all duration-150 rounded shadow outline-none hover:shadow-md focus:outline-none ease header-button">
                                        Регистрация</Link>
                            </div>
                            </nav>
                        </div>
                    </header>
                <main class="mt-16 main">
                    <div class="mx-auto main-content">
                        <a class="font-normal text-2xl">Автопарк</a>
                        <div class="flex slider">
                            <div class="flex slider-img">
                                <div class="border-gray-100 shadow-sm"><img src="./images/kia k8.png"></div>
                                <div class="border-gray-100 shadow-sm"><img src="./images/audia6.png"></div>
                                <div class="border-gray-100 shadow-sm"><img src="./images/volkswagen polo.png"></div>
                                <div class="border-gray-100 shadow-sm"><img src="./images/hyundai.jpg"></div>
                            </div>
                        </div>
                    </div>
                </main>
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
.header-button, .arrow-left, .arrow-right {
    background-color: #4FC3F7;
}
.account {
    padding-left: 1000px;
}
.main-content {
    width: 1539px;
}
.slider {
    margin-top: 40px;
}
.slider-img div {
    display: flex;
    justify-content: center;
    border-radius: 0.25rem;
    background-color: #F7FAFC;
    margin: 0px 5px 0px 5px;
    height: 150px;
}
@media screen {
    .slider-img div {
        max-width: 310px;
    }
}
</style>
