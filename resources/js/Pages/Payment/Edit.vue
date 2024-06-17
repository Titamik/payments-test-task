<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    payment: Object,
    users: Array,
    currencies: Array,
    paymentStatuses: Array
});

const form = useForm({
    id: props.payment.id,
    user_id: props.payment.user_id,
    currency_id: props.payment.currency_id,
    props: props.payment.props,
    value: props.payment.value,
    status: props.payment.status,
});


const submit = () => {
    form.put(route("payments.update", props.payment.id));
};

</script>

<template>
    <Head title="Profile"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Payments</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Edit Payment</h2>

                            <p class="mt-1 text-sm text-gray-600">
                                You are editing an entry with ID {{ payment.id }}
                            </p>
                        </header>

                        <form class="mt-6 space-y-6" @submit.prevent="submit">
                            <div>
                                <InputLabel for="user" value="User"/>
                                <select
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    v-model="form.user_id">
                                    <option v-for="(user, index) in users" :value="index">{{ user }}</option>
                                </select>
                            </div>
                            <div>
                                <InputLabel for="currency" value="Currency"/>
                                <select
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    v-model="form.currency_id">
                                    <option v-for="(currency, index) in currencies" :value="index">
                                        {{ currency }}
                                    </option>
                                </select>
                            </div>
                            <div>
                                <InputLabel for="status" value="Status"/>
                                <select
                                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    v-model="form.status">
                                    <option v-for="(paymentStatus, index) in paymentStatuses" :value="index">
                                        {{ paymentStatus }}
                                    </option>
                                </select>
                            </div>
                            <div>
                                <InputLabel for="value" value="Value"/>

                                <TextInput
                                    id="value"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.value"
                                    required
                                    autofocus
                                    autocomplete="value"
                                />

                                <InputError class="mt-2" :message="form.errors.value"/>
                            </div>

                            <div>
                                <InputLabel for="props" value="Props"/>

                                <textarea rows="4"
                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                          v-model="form.props"></textarea>
                            </div>

                            <PrimaryButton type="submit" :class="{ 'opacity-25': form.processing }"
                                           :disabled="form.processing">
                                Submit
                            </PrimaryButton>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
