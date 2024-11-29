<script setup>
import InputText from './InputText.vue';
const props = defineProps({
    title: String,
})

const model = defineModel()
</script>

<template>
    <InputText :title="props.title" v-model="model"></InputText>
</template>

<style scoped></style>