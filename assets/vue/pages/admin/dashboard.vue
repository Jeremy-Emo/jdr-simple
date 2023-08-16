<template>
  <div>
    <p>
      Choisir un groupe :
      <select v-model="selectedGroupe" @change="onGroupeChoice">
        <option :value="null"></option>
        <option v-for="(groupe, key) in groupes" :key="key + 'groupe'" :value="groupe">{{groupe.nom}}</option>
      </select>
    </p>
    <div v-if="aventure" class="mt-3">
      <p>Aventure actuelle : {{aventure.nom}}</p>
      <player-card v-for="joueur in aventure.joueurs" :key="joueur" :joueur="joueur" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue"
import { getGroupes } from "../../composables/api/getGroupes";
import {getAventure} from "../../composables/api/getAventure";
import PlayerCard from "../../components/player-card.vue";

const groupes = ref([]);

onMounted(async () => {
  groupes.value = await getGroupes()
})

const selectedGroupe = ref(null)
const aventure = ref(null)

const onGroupeChoice = async () => {
  if (selectedGroupe.value !== null) {
    aventure.value = await getAventure(selectedGroupe.value.aventureId)
  }
}

</script>

<style scoped lang="scss">
</style>