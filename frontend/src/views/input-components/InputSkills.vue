<script setup>
import InputText from "@/views/input-components/InputText.vue";

const model = defineModel();
</script>

<template>
<InputText title="Ключевые навыки" v-model="model"></InputText>
</template>

<style scoped>

</style>