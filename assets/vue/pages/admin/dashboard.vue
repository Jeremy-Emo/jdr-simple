<template>
  <div>
    <span v-for="(groupe, key) in groupes" :key="key + 'groupe'">{{groupe.nom}}</span>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue"
import { getGroupes } from "../../composables/api/getGroupes";

const groupes = ref([]);

onMounted(async () => {
  groupes.value = await getGroupes()
})

</script>

<style scoped lang="scss">

</style>