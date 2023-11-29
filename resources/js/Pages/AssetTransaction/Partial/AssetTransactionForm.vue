<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { InertiaForm, Link, useForm } from "@inertiajs/vue3";
import SelectInput from "@/Components/SelectInput.vue";
import { IAssetTransaction, IFound } from '@/Pages/AssetTransaction/AssetTransactionInterface'
import { AssetTransactionMock } from '@/Pages/AssetTransaction/AssetTransactionMock'

defineProps<{
    form: InertiaForm<IAssetTransaction>;
    submitForm: () => void;
    funds: [IFound]
}>();

const form = useForm(AssetTransactionMock);

</script>

<template>
    <div class="mx-auto">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
            <section>
                <form @submit.prevent="submitForm" class="mt-6 space-y-6">
                    <div
                        class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3"
                    >
                        <div>
                            <InputLabel
                                for="fund"
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >
                                Fundo Imobiliário:
                            </InputLabel>
<!--                            <DataList-->
<!--                                v-model="form.fi_asset"-->
<!--                                id="fund"-->
<!--                                name="fund"-->
<!--                                class="mt-1 block w-full"-->
<!--                                required-->
<!--                            >-->
<!--                                <option-->
<!--                                    v-for="fund in funds"-->
<!--                                    :value="fund.acronym"-->
<!--                                >-->
<!--                                    {{ fund.fundName }}-->
<!--                                </option>-->
<!--                            </DataList>-->
<!--                            <InputError-->
<!--                                class="mt-2"-->
<!--                                :message="form.errors.fi_asset.id"-->
<!--                            />-->
                        </div>
                        <div>
                            <InputLabel
                                for="quantity"
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >
                                Quantidade:
                            </InputLabel>
                            <TextInput
                                v-model="form.quantity"
                                type="number"
                                id="quantity"
                                name="quantity"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.quantity"
                            />
                        </div>
                        <div>
                            <InputLabel
                                for="value"
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >Valor por cota:
                            </InputLabel>
                            <TextInput
                                v-model="form.price"
                                type="text"
                                id="price"
                                name="price"
                                class="mt-1 block w-full"
                                required
                                autofocus
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.price"
                            />
                        </div>

                        <div>
                            <InputLabel
                                for="transaction_date"
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >
                                Data da Operação:
                            </InputLabel>
                            <TextInput
                                v-model="form.transaction_date"
                                type="date"
                                id="transaction_date"
                                name="transaction_date"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.transaction_date"
                            />
                        </div>

                        <div>
                            <InputLabel
                                for="transaction_type"
                                class="block text-gray-700 text-sm font-bold mb-2"
                                >Tipo de Transação:
                            </InputLabel>
                            <SelectInput
                                v-model="form.transaction_type"
                                id="transaction_type"
                                name="transaction_type"
                                class="mt-1 block w-full"
                                required
                            >
                                <option value="purchase">Compra</option>
                                <option value="sale">Venda</option>
                            </SelectInput>
                            <InputError
                                class="mt-2"
                                :message="form.errors.transaction_type"
                            />
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <Link
                            :href="route('asset.transaction')"
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
