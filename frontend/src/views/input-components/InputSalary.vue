<script setup>
import {onMounted, ref} from "vue";
import IMask from "imask";

const model = defineModel()

let numberRef = ref(null)
let mask = null

onMounted(() => {
  mask = new IMask(
      numberRef.value,
      {
        mask: Number,
        thousandsSeparator: ' '
      }
  )
})


</script>

<template>
  <div class="mb-3">
    <label for="input-number">Желаемая зарплата</label>
    <input ref="numberRef" v-model="model" id="input-number" type="text" class="form-control" placeholder="Зарплата">
  </div>
</template>

<style scoped>

</style>