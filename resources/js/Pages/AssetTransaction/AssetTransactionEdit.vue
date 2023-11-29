<script setup lang='ts'>
import { Head, Link } from '@inertiajs/vue3'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
</script>
<template>
    <Head title='Transações' />
    <AuthenticatedLayout>
        <template #header>
            <div class='flex justify-between items-center'>
                <h2 class='font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight'>
                    Lista de Transações
                </h2>
                <Link :href="route('financial.transaction.create')"
                      class='w-10 h-10 flex items-center justify-center bg-indigo-500 text-white rounded-full hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700 transition duration-300'>
                    <font-awesome-icon icon='plus' class='h-4 h-4' />
                </Link>
            </div>
        </template>
    </AuthenticatedLayout>
</template>
