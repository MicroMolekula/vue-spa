<template>
  <header class="bg-light py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
      <!-- Логотип или название -->
      <h1 class="fs-4 text-primary m-0">База данных резюме</h1>

      <!-- Навигационные кнопки -->
      <nav>
        <button class="btn btn-outline-primary me-2" @click="goTo('home')">
          Главная
        </button>
        <button class="btn btn-primary" @click="goTo('add')">
          Добавить резюме
        </button>
      </nav>
    </div>
  </header>
</template>

<script setup>
import { useRouter } from "vue-router";

const router = useRouter();

// Функция для перехода по маршрутам
const goTo = (routeName) => {
  router.push({ name: routeName });
};
</script>

<style scoped>
header {
  position: sticky;
  top: 0;
  z-index: 1000;
}
</style>