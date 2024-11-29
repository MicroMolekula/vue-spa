<template>
  <div class="container my-5 p-4 border rounded bg-white" v-if="props.data">

    <div class="row mb-3">
      <div class="wrapper exmpl col-md-3">
        <img :src="props.data.photo" alt="Фото">
      </div>

      <div class="col-md-9">
        <h3 v-if="props.data.name" class="mb-1">{{ props.data.name }}</h3>
        <p class="mb-1" v-if="props.data.dateBirth">
          Дата рождения: {{ props.data.dateBirth }}
        </p>
        <p class="mb-1">
          <i class="bi bi-telephone"></i> {{ props.data.phone !== '+7 ' ? props.data.phone : ''}}
        </p>
        <p class="mb-1">
          <i class="bi bi-envelope"></i> {{ props.data.email }}
        </p>
        <p class="mb-1" v-if="props.data.city">
          Проживает: {{ props.data.city.label }}
        </p>
      </div>
    </div>

    <!-- Желаемая должность и зарплата -->
    <div v-if="props.data.profession" class="mb-3">
      <h4>Желаемая должность</h4>
      <p>{{ props.data.profession }}</p>
    </div>

    <div v-if="props.data.salary" class="mb-3">
      <h4>Желаемая зарплата</h4>
      <p><i>{{ props.data.salary }} руб.</i></p>
    </div>

    <!-- Навыки -->
    <div v-if="props.data.skills" class="mb-3">
      <h4>Ключевые навыки</h4>
      <ul>
        <li>{{ props.data.skills }}</li>
      </ul>
    </div>

    <!-- Образование -->
    <div v-if="getEducationString(props.data.education)" class="mb-3">
      <h4>Образование</h4>
      <ul>
        <li>
          {{ getEducationString(props.data.education) }}
        </li>
      </ul>
    </div>

    <!-- О себе -->
    <div v-if="props.data.about" class="mb-3">
      <h4>О себе</h4>
      <p>{{ props.data.about }}</p>
    </div>
  </div>
  <div style="display:flex; flex-direction: column; align-items: center;" v-else>
    <div style="font-size: 3rem;">Заполните форму</div>
  </div>
</template>

<script setup>

import {ref} from "vue";

const props = defineProps({
  data: Object
})

function getEducationString(edu) {
  let level = edu.level
  if (level === 'Выберете уровень образования...') {
    return '';
  }
  let univer = edu.univer ? edu.univer : ''
  if (univer) {
    return `${level} — ${univer}, ${edu.fac}, ${edu.spec} (${edu.date})`
  }
  return level
}
</script>

<style scoped>
.container {
  max-width: 800px;
}

.wrapper {
  width: 150px;
  height: 150px;
  border-radius: 50%;
}

.exmpl {
  overflow: hidden;
}

.exmpl img {
  width: auto;
  height: 200%;
  margin: -50% 0 0 -50%;
}
</style>