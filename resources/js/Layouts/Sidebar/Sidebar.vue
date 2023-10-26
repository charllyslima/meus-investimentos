<script>
import SidebarItem from './Partial/SidebarItem.vue';

export default {
  components: {
    SidebarItem,
  },
};
</script>

<template>
    <aside class="w-64 bg-gray-800">
        <div class="p-4 text-white text-2xl font-bold">Meu Sidebar</div>

        <nav class="p-2">
            <ul>
                <SidebarItem icon="HomeIcon" text="Dashboard" />
                <SidebarItem icon="UserIcon" text="Perfil" />
                <SidebarItem icon="SettingsIcon" text="Configurações" />
                <!-- Adicione mais itens conforme necessário -->
            </ul>
        </nav>
    </aside>
</template>

<style scoped>
/* Estilize o seu Sidebar conforme necessário */
</style>
