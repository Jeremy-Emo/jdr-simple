<template>
  <div>
    <p>
      Choisir un groupe :
      <select v-model="selectedGroupe" @change="onGroupeChoice">
        <option :value="null"></option>
        <option v-for="(groupe, key) in groupes" :key="key + 'groupe'" :value="groupe">{{groupe.nom}}</option>
      </select>
    </p>
    <hr>
    <div v-if="aventure" class="mt-3">
      <p>Aventure actuelle : {{aventure.nom}}</p>
      <p>{{ aventure.synopsis }}</p>
      <player-card v-for="joueur in aventure.joueurs" :key="joueur" :joueur="joueur" @click="onShowMap(joueur.mapId)" />
    </div>
    <hr>
    <div v-if="map" class="mt-3">
        <map-infos :map="map" :previous-map="previousMap" @move-to="previousMap = map; onShowMap($event)" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue"
import { getGroupes } from "../../composables/api/getGroupes";
import {getAventure} from "../../composables/api/getAventure";
import PlayerCard from "../../components/player-card.vue";
import {getMap} from "../../composables/api/getMap";
import MapInfos from "../../components/map-infos.vue";

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

const map = ref(null)
const previousMap = ref(null)

const onShowMap = async (mapId: number|null|undefined) => {
  if (mapId) {
    map.value = await getMap(mapId)
  } else {
    map.value = null
  }
}

</script>

<style scoped lang="scss">
</style>