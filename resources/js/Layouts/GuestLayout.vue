<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-blue-100 via-blue-200 to-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-800">
        <div class="text-center">
            <Link href="/">
            <ApplicationLogo class="w-40 h-40 mx-auto fill-current text-blue-500" />
            </Link>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-2xl rounded-lg">
            <slot />
        </div>
        <div class="mt-4">
            <slot name="footer" />
        </div>
    </div>
</template>
