<script setup lang="ts">
import SelectInput from '@/Components/SelectInput.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import { Link } from '@inertiajs/vue3'
import { FinancialTransactionForm } from '@/Pages/FinancialTransaction/FinancialTransactionInterface'
import { ref, watch } from 'vue'

defineProps<{
  form: FinancialTransactionForm
  submitForm: () => void
}>()

const localForm = ref({ ...props.form })

watch(
  () => props.form,
  (newFormValue, oldFormValue) => {
    localForm.value = { ...newFormValue }
  }
)
</script>

<template>
  <div class="mx-auto">
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
      <section>
        <form @submit.prevent="submitForm" class="mt-6 space-y-6">
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div>
              <InputLabel
                for="amount"
                class="block text-gray-700 text-sm font-bold mb-2"
              >
                Valor:
              </InputLabel>
              <TextInput
                v-model="localForm.amount"
                type="text"
                id="amount"
                name="amount"
                class="mt-1 block w-full"
                required
                autofocus
              />
              <InputError class="mt-2" :message="form.errors.amount" />
            </div>

            <div>
              <InputLabel
                for="operation_date"
                class="block text-gray-700 text-sm font-bold mb-2"
              >
                Data da Operação:
              </InputLabel>
              <TextInput
                v-model="localForm.transaction_date"
                type="date"
                id="operation_date"
                name="operation_date"
                class="mt-1 block w-full"
                required
              />
              <InputError class="mt-2" :message="form.errors.operation_date" />
            </div>

            <div>
              <InputLabel
                for="transactionType"
                class="block text-gray-700 text-sm font-bold mb-2"
              >
                Tipo de Transação:
              </InputLabel>
              <SelectInput
                v-model="localForm.transaction_type"
                id="transactionType"
                name="transaction_type"
                class="mt-1 block w-full"
                required
              >
                <option value="DEPOSIT">Depósito</option>
                <option value="WITHDRAWAL">Retirada</option>
              </SelectInput>
              <InputError
                class="mt-2"
                :message="form.errors.transaction_type"
              />
            </div>
          </div>

          <div class="flex justify-end space-x-4">
            <Link
              :href="route('transaction')"
              class="bg-gray-500 text-white px-4 py-2 rounded-md"
            >
              Cancelar
            </Link>
            <button
              type="submit"
              class="bg-blue-500 text-white px-4 py-2 rounded-md"
            >
              Salvar
            </button>
          </div>
        </form>
      </section>
    </div>
  </div>
</template>
