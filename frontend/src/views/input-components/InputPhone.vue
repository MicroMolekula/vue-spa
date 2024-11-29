<script setup>
import IMask from "imask";
import {onMounted, ref, watch} from "vue";

let maskString = '+7 (000) 000-00-00'

let maskOptions = {
  mask: maskString,
}
const inputRef = ref(null)

let mask = null

onMounted(() => {
   mask = new IMask(inputRef.value, maskOptions);
})

const model = defineModel();

watch(model, () => {
  if (model.value.length > maskString.length) {
    model.value = model.value.slice(0, -1)
  }
})
</script>

<template>
  <div class="mb-3">
    <label for="input-phone" >Номер телефона</label>
    <input v-model="model" ref="inputRef" id="input-phone" type="text" class="form-control" :placeholder="maskString" aria-label="Username" aria-describedby="basic-addon1">
  </div>
</template>

<style scoped>

</style>