<template>
  <div class="d-flex flex-row main-container">
    <div class="w-50">
      <p class="bold">Nom de la carte : {{ map.nom }}</p>
      <pre>{{ map.infos }}</pre>
      <hr>
      <select v-model="selectedPlayer" class="mb-1 select">
        <option :value="null"></option>
        <option v-for="(joueur, key) in joueurs" :key="key + 'joueur'" :value="joueur.id">{{ joueur.nom }}</option>
      </select>
      <button @click="$emit('move-player', selectedPlayer)" class="mb-1">Déplacer sélectionné</button><br>
      <button @click="$emit('move-all')">Déplacer tous les joueurs</button>
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
            {{ path.mapName }} : {{ path.infos }}
          </li>
        </ul>
        <button @click="$emit('move-to', previousMap.id)">Retour dans la salle précédente</button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

defineProps({
  map: { type: Object, required: true },
  previousMap: { type: Object, required: true },
  joueurs:  { type: Object, required: true },
})

defineEmits<{
  (event: "move-to", value: string): void
  (event: "move-player", value: string): void
  (event: "move-all"): void
}>()

const selectedPlayer = ref(null)
</script>

<style scoped lang="scss">
.main-container {
  div {
    padding: 5px;

    select {
      margin-right: 5px;
    }
  }
}

.bold {
  font-weight: 500;
}

button {
  cursor: pointer;
}
</style>