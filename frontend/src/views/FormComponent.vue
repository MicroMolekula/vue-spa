<script setup>
import InputText from "@/views/input-components/InputText.vue"
import InputTextArea from "./input-components/InputTextArea.vue";
import InputUrl from "./input-components/InputUrl.vue";
import InputSelect from "./input-components/InputSelect.vue";
import {effect, ref, watch} from "vue";
import InputEmail from "@/views/input-components/InputEmail.vue";
import InputSkills from "@/views/input-components/InputSkills.vue";
import InputPhone from "@/views/input-components/InputPhone.vue";
import InputSalary from "@/views/input-components/InputSalary.vue";
import InputDate from "@/views/input-components/InputDate.vue";
import InputEducation from "@/views/input-components/InputEducation.vue";
import InputCity from "@/views/input-components/InputCity.vue";
import {getStatusCode} from "@/utils/statusMap.js";
import InputStatus from "@/views/input-components/InputStatus.vue";
import {useRouter} from "vue-router";

const data = defineModel()
data.value = {
  profession: '',
  about: '',
  city: '',
  photo: '',
  name: '',
  phone: '',
  email: '',
  dateBirth: '',
  education: {
    level: 'Выберете уровень образования...',
    univer: '',
    fac: '',
    spec: '',
    date: ''
  },
  salary: '',
  skills: '',
  status: ''
}

const emit = defineEmits(['data-form'])

const router = useRouter();

</script>

<template>
  <div>
    <InputText title="Проффесия" v-model="data.profession"></InputText>
    <InputTextArea title="О себе" v-model="data.about"></InputTextArea>
    <InputCity v-model="data.city"></InputCity>
    <InputUrl title="Фото" v-model="data.photo"></InputUrl>
    <InputText title="ФИО" v-model="data.name"></InputText>
    <InputEmail v-model="data.email"></InputEmail>
    <InputSkills v-model="data.skills"></InputSkills>
    <InputPhone v-model="data.phone"></InputPhone>
    <InputSalary v-model="data.salary"></InputSalary>
    <InputDate title="Дата рождения" v-model="data.dateBirth"></InputDate>
    <InputEducation v-model="data.education" :city-id="data.city.id"></InputEducation>
    <InputStatus v-model="data.status"></InputStatus>
  </div>
</template>


<style scoped></style>