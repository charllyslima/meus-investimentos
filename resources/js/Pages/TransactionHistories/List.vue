<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, Link } from '@inertiajs/vue3';

defineProps<{
    transactionHistories?: any;
}>();


</script>

<template>
    <Head title="Transações" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Lista de Transações</h2>
            <Link :href="route('transaction-histories.create')"> Criar Transação</Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 v-if="transactionHistories.length == 0">
                            Sem dados
                        </h1>
                        <div>
                            <ul>
                                <li v-for="transaction in transactionHistories" :key="transaction.id">
                                    {{ transaction.amount }} - {{ transaction.transaction_type }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

