<template>
  <div
      class="container-card"
      @mouseover="hover = true"
      @mouseleave="hover = false"
  >
    {{ joueur.nom }}
    <span v-if="hover">
      {{ joueur.personnage.nom }} ({{ joueur.personnage.job }})<br>
      Force : {{ joueur.personnage.force }} / Agilité : {{ joueur.personnage.agilite }}<br>
      Esprit : {{ joueur.personnage.esprit }} / Charisme : {{ joueur.personnage.charisme }}<br>
    </span>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

const props = defineProps({
  joueur: { type: Object, required: true }
})

const hover = ref(false)
</script>

<style scoped lang="scss">
  .container-card {
    border: 1px solid black;
    padding: 5px 10px;
    display: inline-block;
    margin: 2px;
    position: relative;
    cursor: pointer;

    span {
      display: inline-block;
      background-color: #ddd;
      box-shadow: rgba(0, 0, 0, 0.16) 0 1px 4px;
      position: absolute;
      padding: 5px 15px;
      top: 30px;
      left: 5px;
      z-index: 10;
      width: 250px;
    }
  }
</style>