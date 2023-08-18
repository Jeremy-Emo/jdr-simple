<template>
  <div class="d-flex flex-row">
      <div class="w-50">
        <p class="bold">Nom de la carte : {{ map.nom }}</p>
        <pre>{{ map.infos }}</pre>
      </div>
    <div class="w-50 d-flex flex-column">
      <div>
        <p>Se déplacer :</p>
        <ul>
          <li
              v-for="(path, key) in map.paths"
              :key="'path' + key"
              class="cursor-pointer"
              @click="$emit('move-to', path.toId)"
          >
            {{ path.infos }}
          </li>
        </ul>
        <button @click="$emit('move-to', previousMap.id)">Retour dans la salle précédente</button>


        TODO : prévoir un moyen de déplacer qu'un ou plusieurs personnages
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps({
  map: { type: Object, required: true },
  previousMap: { type: Object, required: true },
})

defineEmits<{
  (event: "move-to", value: string): void
}>()
</script>

<style scoped lang="scss">
.bold {
  font-weight: 500;
}
</style>