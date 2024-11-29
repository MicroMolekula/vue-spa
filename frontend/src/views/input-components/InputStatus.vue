<script setup>
import {ref} from "vue";

const statuses = ref(['NEW', 'SCHEDULED', 'ACCEPTED', 'REFUSAL'])

const model = defineModel()
</script>

<template>
  <div class="mb-3">
    <label for="select-id">Статус</label>
    <select id="select-id" class="form-select" v-model="model">
      <option selected>Выберете статус...</option>
      <option v-for="levelEdu in statuses" :value="levelEdu">{{ levelEdu }}</option>
    </select>
  </div>
</template>

<style scoped>

</style>