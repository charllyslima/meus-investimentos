<script>
import NavLink from "@/Components/NavLink.vue";
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
export default {
    components: {NavLink, FontAwesomeIcon},
    props: {
        to: String,
        icon: String,
        text: String,
    }
};
</script>

<template>
    <li class="rounded-sm">
        <NavLink :href="route(to)" :active="route().current(to)"
                 class="flex items-center p-4 space-x-3 rounded-md w-full">
            <font-awesome-icon :icon="icon" />
            <span class="text-gray-100">{{ text }}</span>
        </NavLink>
    </li>
</template>
