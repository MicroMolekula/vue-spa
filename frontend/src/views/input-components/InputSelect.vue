<script setup>
const props = defineProps({
    title: String,
    options: Array,
})

const model = defineModel()
</script>

<template>
    <div class="mb-3">
        <label for="select-input">{{ props.title }}</label>
        <select id="select-input" class="form-select" :aria-label="props.title" v-model="model">
            <option v-for="option in props.options" :value="option.value">{{ option.name }}</option>
        </select>
    </div>
</template>