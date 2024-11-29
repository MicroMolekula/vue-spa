<template>
  <div class="d-flex flex-column align-items-center justify-content-center vh-100 text-center">
    <!-- Ошибка -->
    <h1 class="display-1 text-danger">404</h1>
    <p class="fs-4 text-secondary">Страница не найдена</p>

    <!-- Описание -->
    <p class="text-muted">
      К сожалению, страница, которую вы ищете, не существует. Возможно, вы ошиблись адресом или страница была удалена.
    </p>

    <!-- Кнопка для возврата на главную -->
    <button class="btn btn-primary mt-3" @click="goHome">Вернуться на главную</button>
  </div>
</template>

<script>
import { useRouter } from "vue-router";

export default {
  name: "NotFound",
  setup() {
    const router = useRouter();

    const goHome = () => {
      router.push({ name: "home" }); // Переход на главную страницу
    };

    return {
      goHome,
    };
  },
};
</script>

<style scoped>
h1 {
  font-size: 6rem;
  font-weight: bold;
}

p {
  max-width: 600px;
}
</style>