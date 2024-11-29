<script setup>
const model = defineModel();
</script>

<template>
<div class="mb-3">
  <label for="email-input">Email</label>
  <input v-model="model" id="email-input" type="email" class="form-control" placeholder="Email" aria-label="Email">
</div>
</template>

<style scoped></style>