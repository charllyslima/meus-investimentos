<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'
import { FinancialTransactionMock } from '@/Pages/FinancialTransaction/FinancialTransactionMock'
import FinancialTransactionForm from '@/Pages/FinancialTransaction/Partial/FinancialTransactionForm.vue'

const form = useForm(FinancialTransactionMock)

const submitForm = () => {
  form.post(route('transaction.create'), {
    onFinish: (r) => {
      console.log(r)
      // form.reset('amount');
    }
  })
}
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Cadastrar Transação</h2>
        </template>
        <FinancialTransactionForm :form="form" :submit-form="submitForm" />
    </AuthenticatedLayout>
</template>
