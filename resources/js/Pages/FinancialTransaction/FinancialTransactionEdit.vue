<script setup lang='ts'>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { type FinancialTransaction } from './FinancialTransactionInterface'
import { FinancialTransactionConstruct } from '@/Pages/FinancialTransaction/FinancialTransactionMock'
import FinancialTransactionForm from '@/Pages/FinancialTransaction/Partial/FinancialTransactionForm.vue'

const props = defineProps<{ financialTransaction: FinancialTransaction }>()
const mockObject = FinancialTransactionConstruct(
    props.financialTransaction.id,
    props.financialTransaction.amount,
    props.financialTransaction.transaction_type,
    props.financialTransaction.transaction_date
)
const form = useForm(mockObject)

const submitForm = () => {
    form.put(route('transaction.update', { id: props.financialTransaction.id }), {
        onFinish: () => {
            // userForm.reset('amount');
        }
    })
}
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class='font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight'>
                Atualizar Transação
            </h2>
        </template>
        <FinancialTransactionForm :form='form' :submit-form='submitForm' />

    </AuthenticatedLayout>
</template>
