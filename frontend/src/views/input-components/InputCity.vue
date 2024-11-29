<template>
  <label for="dd">Город</label>
  <div class="dropdown mb-3" id="dd">
    <button
        class="btn btn-secondary dropdown-toggle"
        type="button"
        id="dropdownMenuButton"
        data-bs-toggle="dropdown"
        aria-expanded="false"
    >
      {{ selectedLabel }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <!-- Поле для поиска -->
      <li class="p-2">
        <input
            type="text"
            class="form-control"
            v-model="searchQuery"
            @input="searchCities"
            placeholder="Поиск..."
        />
      </li>
      <li>
        <hr class="dropdown-divider" />
      </li>
      <!-- Список опций -->
      <li
          v-for="option in filteredOptions"
          :key="option.id"
          class="dropdown-item"
          @click="selectOption(option)"
      >
        {{ option.label }}
      </li>
      <!-- Если опций нет -->
      <li v-if="filteredOptions.length === 0" class="dropdown-item text-muted">
        Ничего не найдено
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import {filter} from "vuedraggable/dist/vuedraggable.common.js";
import {getAccessToken} from "@/config/accessToken.js";

const emit = defineEmits(['cityValue'])
const searchQuery = ref(""); // Поисковый запрос
const selectedOption = ref(null); // Выбранный элемент

// Фильтрованные опции
const filteredOptions = ref([]);

// Метка для выбранного элемента
const selectedLabel = ref("Выберите элемент");

const model = defineModel()

// Обработчик выбора элемента
const selectOption = (option) => {
  selectedLabel.value = option.label
  model.value = {
    label: option.label,
    id: option.id
  }
};

function searchCities(searchQuery) {
  const params = new URLSearchParams({
    v: '5.81',
    country_id: '1',
    region_id: '0',
    offset: '0',
    need_all: '0',
    count: '10',
    q: searchQuery.target.value
  })
  fetch(`/api/method/database.getCities?${params}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8',
      'Authorization': 'Bearer ' + getAccessToken()
    }
  }).then(
      function (response) {
        response.json().then(
            (res) => {
              filteredOptions.value = filterCities(res.response.items)
            }
        )
      }
  )
}

function filterCities(cities) {
  let result = []
  for (let city of cities) {
    result.push({
      label: city.title,
      id: city.id,
    })
  }
  return result
}
</script>

<style scoped>
/* Стили можно подправить для лучшего отображения */
.dropdown-item {
  cursor: pointer;
}
.dropdown-item:hover {
  background-color: #f8f9fa;
}
</style>