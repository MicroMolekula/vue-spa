import { createRouter, createWebHistory } from 'vue-router'
import HomeView from "@/views/HomeView.vue";
import AddComponent from "@/views/AddComponent.vue";
import EditComponent from "@/views/EditComponent.vue";
import ErrorComponent from "@/views/ErrorComponent.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/add',
      name: 'add',
      component: AddComponent
    },
    {
      path: '/:id/edit',
      name: 'edit',
      component: EditComponent
    },
    {
      path: '/:pathMatch(.*)*',
      redirect: '/error'
    },
    {
      path: '/error',
      name: 'error',
      component: ErrorComponent
    },
  ],
})

export default router
