<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3'
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AssetTransactionForm from "@/Pages/AssetTransaction/Partial/AssetTransactionForm.vue";
import { AssetTransactionMock } from '@/Pages/AssetTransaction/AssetTransactionMock'
import { IFound } from '@/Pages/AssetTransaction/AssetTransactionInterface'

const form = useForm(AssetTransactionMock);
defineProps<{
    founds: IFound[]
}>()
const submitForm = () => {
    form.post(route('asset.transaction.create'), {
        onFinish: (r) => {
            console.log(r)
            // form.reset('amount');
        }
    })
}

</script>
<template>
    <Head title="Transações" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Lista de Transações com fundos imobiliários
                </h2>
                <Link
                    :href="route('asset.transaction.create')"
                    class="w-10 h-10 flex items-center justify-center bg-indigo-500 text-white rounded-full hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700 transition duration-300"
                >
                    <font-awesome-icon icon="plus" class="h-4 h-4" />
                </Link>
            </div>
        </template>
        <AssetTransactionForm :form="form" :submit-form="submitForm" :funds="founds" />
    </AuthenticatedLayout>
</template>
