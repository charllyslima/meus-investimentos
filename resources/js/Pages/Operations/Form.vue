<script setup lang="ts">

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import Form from '@/Pages/FinancialTransaction/FinancialTransactionCreate.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import { Link, useForm } from '@inertiajs/vue3'
import SelectInput from '@/Components/SelectInput.vue'
import { type Fund } from './type'
import DataList from '@/Components/DataList.vue'

const props = defineProps<{
  funds: Fund[]
  id?: number
}>()
console.log(props.funds)
const form = useForm({
  operation_date: new Date().toISOString().substr(0, 10),
  fund: null,
  quantity: 0,
  value: null,
  operation_type: 'purchase'
})

const submitForm = () => {
  if (props.id) {
    form.put(route('operation.update', { id: props.id }), {
      onFinish: (r) => {
        console.log(r)
        // form.reset('amount');
      }
    })
  } else {
    form.post(route('operation.create'), {
      onFinish: (r) => {
        console.log(r)
        // form.reset('amount');
      }
    })
  }
}

</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ props.id ? 'Atualizar' : 'Criar' }} Operação</h2>
        </template>
        <div class="">
            <div class="mx-auto">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <section>
                        <form @submit.prevent="submitForm" class="mt-6 space-y-6">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                <div>
                                    <InputLabel for="fund"
                                                class="block text-gray-700 text-sm font-bold mb-2">Fundo Imobiliário:
                                    </InputLabel>
                                    <DataList v-model="form.fund" id="fund"
                                                 name="fund" class="mt-1 block w-full" required>
                                        <option v-for="fund in props.funds" :value="fund.acronym">{{fund.fundName}}</option>
                                    </DataList>
                                    <InputError class="mt-2" :message="form.errors.fund"/>
                                </div>
                                <div>
                                    <InputLabel for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantidade:
                                    </InputLabel>
                                    <TextInput v-model="form.quantity" type="number" id="quantity" name="quantity"
                                               class="mt-1 block w-full" required/>
                                    <InputError class="mt-2" :message="form.errors.quantity"/>
                                </div>
                                <div>
                                    <InputLabel for="value" class="block text-gray-700 text-sm font-bold mb-2">Valor por cota:
                                    </InputLabel>
                                    <TextInput v-model="form.value" type="text" id="value" name="value"
                                               class="mt-1 block w-full" required autofocus/>
                                    <InputError class="mt-2" :message="form.errors.value"/>
                                </div>

                                <div>
                                    <InputLabel for="operation_date" class="block text-gray-700 text-sm font-bold mb-2">
                                        Data da Operação:
                                    </InputLabel>
                                    <TextInput v-model="form.operation_date" type="date" id="operation_date"
                                               name="operation_date" class="mt-1 block w-full" required/>
                                    <InputError class="mt-2" :message="form.errors.operation_date"/>
                                </div>

                                <div>
                                    <InputLabel for="operationType"
                                                class="block text-gray-700 text-sm font-bold mb-2">Tipo de Transação:
                                    </InputLabel>
                                    <SelectInput v-model="form.operation_type" id="operationType"
                                                 name="type_operation" class="mt-1 block w-full" required>
                                        <option value="purchase">Compra</option>
                                        <option value="sale">Venda</option>
                                    </SelectInput>
                                    <InputError class="mt-2" :message="form.errors.operation_type"/>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-4">
                                <Link :href="route('operation')" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                                    Cancelar
                                </Link>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ props.id ? 'Atualizar' : 'Criar'}}
                                    Operação
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
