<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="mb-2 font-semibold text-2xl leading-tight">Задание:</h3>
                        <p class="mb-4">Необходимо создать административную панель, которая состоит из единого раздела “Выплаты”.
                        </p>
                        <h4 class="mb-2 font-semibold text-xl">Описание:</h4>
                        <p class="mb-2">
                            Раздел “Выплаты” должен быть представлен в виде таблицы с полями:</p>
                        <ul class="mb-2 pl-4 max-w-md space-y-1 list-disc list-inside dark:text-gray-400">
                            <li>Логин</li>
                            <li>Реквизиты (много текста)</li>
                            <li>Сумма</li>
                            <li>Валюта</li>
                            <li>Статус заявки</li>
                            <li>Логин</li>
                        </ul>
                        <p>
                            Поле “Статус заявки” должно содержать в себе переменную со значениями “Оплачен”/”Не
                            оплачен”. По умолчанию каждой новой записи в таблице присваивается значение статуса “Не
                            оплачен”, по клику на это поле через дроп-меню можно изменить значение статуса на “Оплачен”.
                            Новые записи в таблице должны появляться через API-метод, через который будут приходить
                            значения для соответствующих полей в таблице. API должно содержать базовую защиту по токену.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
