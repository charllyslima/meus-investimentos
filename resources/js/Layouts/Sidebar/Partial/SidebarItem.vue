<template>
    <li class="mb-2">
        <router-link :to="to"
            class="block p-2 text-gray-300 hover:bg-gray-700 hover:text-white active:bg-gray-600 active:text-white">
            <i :class="iconClass"></i>
            {{ text }}
        </router-link>
    </li>
</template>

<script>
export default {
    props: {
        to: String,
        icon: String,
        text: String,
    },
    computed: {
        iconClass() {
            return this.icon ? `feather-icon ${this.icon}` : '';
        },
    },
};
</script>

<style scoped>
.feather-icon {
    margin-right: 0.5rem;
}
</style>
