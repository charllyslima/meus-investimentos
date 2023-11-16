<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {useForm, Link} from '@inertiajs/vue3';
import SelectInput from "@/Components/SelectInput.vue";


const form = useForm({
    amount: 0,
    transaction_type: 'deposit',
    operation_date: new Date().toISOString().substr(0, 10)
});

const submitForm = () => {
    form.post(route('transaction.create'), {
        onFinish: (r) => {
            console.log(r);
            // form.reset('amount');
        },
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Criar Transação</h2>
        </template>
        <div class="">
            <div class="mx-auto">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <section>
                        <form @submit.prevent="submitForm" class="mt-6 space-y-6">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                <div>
                                    <InputLabel for="amount" class="block text-gray-700 text-sm font-bold mb-2">Valor:</InputLabel>
                                    <TextInput v-model="form.amount" type="text" id="amount" name="amount" class="mt-1 block w-full" required autofocus />
                                    <InputError class="mt-2" :message="form.errors.amount" />
                                </div>

                                <div>
                                    <InputLabel for="operation_date" class="block text-gray-700 text-sm font-bold mb-2">Data da Operação:</InputLabel>
                                    <TextInput v-model="form.operation_date" type="date" id="operation_date" name="operation_date" class="mt-1 block w-full" required />
                                    <InputError class="mt-2" :message="form.errors.operation_date" />
                                </div>

                                <div>
                                    <InputLabel for="transactionType" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Transação:</InputLabel>
                                    <SelectInput model-value="form.transaction_type" id="transactionType" name="transaction_type" class="mt-1 block w-full" required>
                                        <option value="deposit">Depósito</option>
                                        <option value="withdrawal">Retirada</option>
                                    </SelectInput>
                                    <InputError class="mt-2" :message="form.errors.transaction_type" />
                                </div>
                            </div>

                            <div class="flex justify-end space-x-4">
                                <Link :href="route('transaction')" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancelar</Link>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Criar Transação</button>
                            </div>
                        </form>


                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


