<script setup>
import {onMounted, ref, watch} from "vue";
import IMask from "imask";

let inputRef = ref(null)
const model = defineModel()
let mask = null
const props = defineProps({
  title: String,
  pattern: String,
})

let dateString = '01.01.2000';

onMounted(() => {
  mask = new IMask(inputRef.value, {
    mask: Date,
    pattern: props.pattern ?? 'd.`m.`Y',
    blocks: {
      d: {
        mask: IMask.MaskedRange,
        from: 1,
        to: 31,
        maxLength: 2,
      },
      m: {
        mask: IMask.MaskedRange,
        from: 1,
        to: 12,
        maxLength: 2,
      },
      Y: {
        mask: IMask.MaskedRange,
        from: 1900,
        to: 9999,
      }
    },
  })
})

watch(model, () => {
  if (model.value.length > dateString.length) {
    model.value = model.value.slice(0, -1)
  }
})
</script>

<template>
  <div class="mb-3">
    <label for="input-id">{{ props.title }}</label>
    <input ref="inputRef" v-model="model" id="input-id" type="text" class="form-control" :placeholder="dateString">
  </div>
</template>

<style scoped>

</style>