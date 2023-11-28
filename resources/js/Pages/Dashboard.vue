<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { formatMoney } from '@/Utils/formatUtils'

defineProps(['totalInvested'])

</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-3">
            <div class="w-full px-4 py-5 bg-white rounded-lg shadow">
                <div class="text-sm font-medium text-gray-500 truncate">
                    Patrimonio total
                </div>
                <div class="mt-1 text-3xl font-semibold text-gray-900">
                    {{formatMoney(totalInvested)}}
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-white rounded-lg shadow">
                <div class="text-sm font-medium text-gray-500 truncate">
                    Lucro Mensal
                </div>
                <div class="mt-1 text-3xl font-semibold text-gray-900">
                    $ 450k
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-white rounded-lg shadow">
                <div class="text-sm font-medium text-gray-500 truncate">
                    Total Investido
                </div>
                <div class="mt-1 text-3xl font-semibold text-gray-900">
                    20k
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
