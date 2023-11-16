<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {TransactionHistories} from './type';
import Swal from 'sweetalert2';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

defineProps<{
    transactionHistories: TransactionHistories[];
}>();

const deleteTransaction = async (id: number) => {
    const {isConfirmed} = await Swal.fire({
        title: 'Tem certeza de que deseja apagar esta transação?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
    });

    if (isConfirmed) {
        const form = useForm({id});
        form.delete(route('transaction.destroy'), {
            onFinish: (r) => {
                console.log(r);
            },
        });
    }
};


</script>

<template>
    <Head title="Transações"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Lista de
                    Transações</h2>
                <Link :href="route('transaction.create')"
                      class="w-10 h-10 flex items-center justify-center bg-indigo-500 text-white rounded-full hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700 transition duration-300">
                        <font-awesome-icon icon="plus" class="h-4 h-4"/>
                </Link>
            </div>
        </template>

        <div class="">
            <div class="mx-auto">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 v-if="transactionHistories.length == 0">
                            Sem dados
                        </h1>
                        <table v-else class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Valor
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Tipo de Transação
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Data da Transação
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            <tr v-for="transaction in transactionHistories" :key="transaction.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ transaction.amount }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ transaction.transaction_type }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ transaction.operation_date }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex space-x-3 justify-center">
                                    <Link :href="route('transaction.create')"
                                          class="bg-yellow-500 text-white hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-400 px-4 py-2 rounded-md">
                                        Editar
                                    </Link>
                                    <button @click="deleteTransaction(transaction.id)"
                                            class="bg-red-500 text-white hover:bg-red-600 focus:ring-4 focus:ring-red-400 px-4 py-2 rounded-md">
                                        Apagar
                                    </button>
                                    <Link :href="route('transaction.destroy')">

                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


