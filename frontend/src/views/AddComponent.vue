<script setup>
import FormComponent from "@/views/FormComponent.vue"
import ResumeComponent from "@/views/ResumeComponent.vue"
import {ref} from "vue";
import {useRouter} from "vue-router";

const router = useRouter()

const dataFromForm = ref({
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
})

function getDataFromForm(data) {
  dataFromForm.value = data
}

function submitForm() {
  console.log(dataFromForm.value)
  // validation
  fetch('http://localhost/api/cv/add', {
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
    <button type="button" class="btn btn-primary" @click="submitForm">Добавить</button>
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