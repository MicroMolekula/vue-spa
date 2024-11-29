<script setup>
const props = defineProps({
    title: String,
})

const model = defineModel()
</script>

<template>
    <div class="mb-3">
        <label for="textarea-input" class="form-label">{{ props.title }}</label>
        <textarea id="textarea-input" class="form-control" :aria-label="props.title" v-model="model"></textarea>
    </div>
</template>

<style scoped></style>