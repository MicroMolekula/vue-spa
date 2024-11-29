<script setup>
import FormComponent from "@/views/FormComponent.vue"
import ResumeComponent from "@/views/ResumeComponent.vue"
import {onMounted, ref} from "vue";
import {useRoute, useRouter} from "vue-router";

const route = useRoute()
const router = useRouter()

let resumeId = route.params.id

const dataFromForm = ref({
  id: '',
  profession: '',
  about: '',
  city: '',
  photo: '',
  name: '',
  phone: '',
  email: '',
  dateBirth: '',
  education: '',
  salary: '',
  skills: '',
  status: ''
})

onMounted(() => {
  fetch(`http://localhost/api/cv/${resumeId}`).then(
      (response) => {
        if (!response.ok) {
          console.log('ok')
          goTo('error')
        }
        response.json().then(
            (body) => {
              console.log(body)
              body.salary = String(body.salary)
              dataFromForm.value = body
            }
        )
      }
  )
})

function getDataFromForm(data) {
  dataFromForm.value = data
}

function submitForm() {
  // validation
  fetch(`http://localhost/api/cv/${resumeId}/edit`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8'
    },
    body: JSON.stringify(dataFromForm.value)
  }).then(
      (response) => {
        if (response.ok) {
          redirectToHome()
        } else {
          alert('Ошибка')
        }
      }
  )
}

function redirectToHome() {
  router.push({ name: 'home' })
}

function goTo(name) {
  router.push({name: name})
}
</script>

<template>
  <div class="main">
    <FormComponent v-model="dataFromForm" class="form"></FormComponent>
    <ResumeComponent :data="dataFromForm" class="resume"></ResumeComponent>
  </div>
  <button type="button" class="btn btn-primary" @click="submitForm">Редактировать</button>
</template>

<style scoped>
.main {
  display: flex;
  flex-direction: row;
}

.form {
  width: 30%;
}

.resume {
  width: 70%;
}
</style>