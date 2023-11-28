<script setup>
import SidebarItem from '@/Layouts/Sidebar/Partial/SidebarItem.vue'

const props = defineProps(['isOpen'])
</script>

<template>
    <div class="flex">
        <div :class="isOpen?'w-screen px-3': 'w-0'"
             class="flex flex-col md:p-6 duration-300 bg-gray-800 shadow h-screen-minus-header absolute md:relative w-0 md:w-60 overflow-hidden">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-white">
                    {{ $inertia.page.props.appName }}
                </h2>
                <button @click="isOpen = !isOpen" class="hidden" id="sidebar-mobile"/>
            </div>
            <div class="flex-1">
                <ul class="pt-2 pb-4 space-y-1 text-sm  flex space-y-3 flex-col">
                    <SidebarItem text="Inicio" icon="home" to="dashboard"/>
                    <SidebarItem text="Transações" icon="arrow-right-arrow-left" to="transaction"/>
                </ul>
            </div>
        </div>
        <div class="container mx-auto p-6 h-screen-minus-header overflow-y-auto">
            <slot></slot>
        </div>
    </div>
</template>
