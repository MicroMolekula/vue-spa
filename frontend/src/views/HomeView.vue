<template>
  <div class="container py-4">
    <div class="row">
      <div v-for="(items, column) in columns" :key="column" class="col-md-3">
        <h5 class="text-center">{{ column }}</h5>
        <!-- Компонент draggable -->
        <draggable
            v-model="columns[column]"
            group="shared"
            class="list-group"
            :sort="true"
            itemKey="id"
            @change="onElementMoved(column, $event)"
        >
          <!-- Используем слот item -->
          <template #item="{ element }">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img
                      :src="element.photo"
                      class="img-fluid rounded-start"
                      alt="Фото"
                  />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ element.profession }}</h5>
                    <p class="card-text mb-1"><strong>ФИО:</strong><br/> {{ element.name }}</p>
                    <p class="card-text"><strong>Дата рождения:</strong><br/> {{ element.dateBirth }}</p>
                  </div>
                  <button type="button" class="btn btn-primary" @click="goTo(`/${element.id}/edit`)">Редактировать</button>
                </div>
              </div>
            </div>
          </template>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script setup>
import draggable from 'vuedraggable'
import {createElementVNode, onMounted, ref} from "vue";
import {get} from "vuedraggable/dist/vuedraggable.common.js";
import { getStatusCode } from "@/utils/statusMap.js";
import {formatTimestamp} from "@/utils/formatTimestamp.js";
import { useRouter } from "vue-router";

const router = useRouter();

// Функция для перехода по маршрутам
const goTo = (path) => {
  router.push({ path: path });
};

const columns = ref({
  Новый: [],
  "Назначено собеседование": [],
  Принят: [],
  Отказ: [],
})

let resumes = ref({})

onMounted(function () {
  getCV().then(
      function(response) {
        resumes.value = response
        console.log(resumes.value)
        distribute(resumes.value)
        formatedDate(resumes.value)
      }
  )
})

function distribute(resumes) {
  for (let resume of resumes) {
    switch (resume.status) {
      case 'NEW':
        columns.value['Новый'].push(resume)
        break
      case 'SCHEDULED':
        columns.value['Назначено собеседование'].push(resume)
        break
      case 'ACCEPTED':
        columns.value['Принят'].push(resume)
        break
      case 'REFUSAL':
        columns.value['Отказ'].push(resume)
        break
    }
  }
}

async function getCV() {
  let response = await fetch('http://localhost/api/cv')

  if (response.ok) {
    return await response.json()
  }
}

function formatedDate(resumes) {
  for (let resume of resumes) {
    let parseDate = Date.parse(resume.dateBirth)
    resume.dateBirth = formatTimestamp(parseDate)
  }
}

function onElementMoved(column, event) {
  const { added, removed } = event;

  if (added) {
    fetch(`http://localhost/api/cv/${added.element.id}/status/update`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      },
      body: JSON.stringify({
        status: getStatusCode(column)
      })
    }).then(
        function (response) {
          console.log(response.json())
        }
    )
  }
}
</script>

<style scoped>
.list-group {
  min-height: 200px;
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  padding: 10px;
  background-color: #f8f9fa;
}
.list-group-item {
  margin-bottom: 5px;
  cursor: grab;
}
</style>