<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import { type FinancialTransaction } from './FinancialTransactionInterface'
import Swal from 'sweetalert2'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { formatDate, formatMoney } from '@/Utils/formatUtils'

defineProps<{
  financialTransactions: FinancialTransaction[]
  totalDeposit: number
  totalWithdraw: number
  totalBalance: number
}>()

const deleteTransaction = async (id: number) => {
  const { isConfirmed } = await Swal.fire({
    title: 'Tem certeza de que deseja apagar esta transação?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sim',
    cancelButtonText: 'Não'
  })

  if (isConfirmed) {
    const form = useForm({ id })
    form.delete(route('transaction.destroy', { id: form.id }), {
      onFinish: (r) => {
        console.log(r)
      }
    })
  }
}

const translateTransactionType = (type: string) => {
  const translations = {
    DEPOSIT: 'Depósito',
    WITHDRAWAL: 'Retirada'
  }

  return translations[type] || type
}

</script>

<template>
    <Head title="Transações"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Lista de Transações
                </h2>
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
                        <h1 v-if="financialTransactions.length == 0">
                            Sem dados
                        </h1>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Data da Transação
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Valor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Transação
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ações
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    v-for="transaction in financialTransactions" :key="transaction.id">
                                    <td class="px-6 py-4">
                                        {{ formatDate(transaction.transaction_date, false) }}
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ formatMoney(transaction.amount) }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ translateTransactionType(transaction.transaction_type) }}
                                    </td>

                                    <td class="px-6 py-4 text-right flex space-x-8">
                                        <Link :href="route('transaction.edit', {id: transaction.id})"
                                              class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Editar
                                        </Link>
                                        <button @click="deleteTransaction(transaction.id)"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Apagar
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3">{{ formatMoney(totalBalance) }}</td>
                                    <td class="px-6 py-3">
                                        <p class="text-green-600">
                                            <strong>Depositado:</strong> {{ formatMoney(totalDeposit) }}
                                        </p>
                                        <p class="text-red-600">
                                            <strong>Retirado:</strong> {{ formatMoney(totalWithdraw) }}
                                        </p>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
