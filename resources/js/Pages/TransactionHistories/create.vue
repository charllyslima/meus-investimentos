<script setup>
import { ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
const formData = ref({
    amount: '',
    transaction_type: 'deposit', // Valor padrão
});

const submitForm = () => {
    // Envie os dados do formulário para o servidor (por exemplo, usando Axios)
    // Implemente a lógica de envio dos dados aqui
};
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Criar Transação</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Criar Transação</h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Certifique-se de que sua conta esteja usando uma senha longa e aleatória para permanecer
                                segura.
                            </p>
                        </header>
                        <form @submit.prevent="submitForm" class="mt-6 space-y-6">
                            <div class="mb-4">
                                <InputLabel for="amount" class="block text-gray-700 text-sm font-bold mb-2">Valor:
                                </InputLabel>
                                <TextInput v-model="formData.amount" type="text" id="amount" name="amount"
                                    class="mt-1 block w-full" required />
                            </div>

                            <div class="mb-4">
                                <InputLabel for="transactionType" class="block text-gray-700 text-sm font-bold mb-2">
                                    Tipo de Transação:
                                </InputLabel>
                                <select v-model="formData.transaction_type" id="transactionType" name="transaction_type"
                                    class="mt-1 block w-full" required>
                                    <option value="deposit">Depósito</option>
                                    <option value="withdrawal">Retirada</option>
                                </select>
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Criar
                                Transação</button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


