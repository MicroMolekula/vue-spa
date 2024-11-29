<script setup>
const props = defineProps({
    title: String
})

const model = defineModel()
</script>

<template>
    <div class="mb-3">
        <label for="input-text" class="form-label">{{ props.title }}</label>
        <input type="text" id="input-text" class="form-control" placeholder="Введите значение" :aria-label="props.title"
            v-model="model">
    </div>
</template>

<style scoped></style>