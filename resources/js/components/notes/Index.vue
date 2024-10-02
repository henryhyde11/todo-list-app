<template>
    <div class="flex items-center justify-between gap-4 mb-4">
        <h1 class="text-3xl font-bold text-center">Resumen de tareas</h1>

        <button
            @click="newNote"
            type="button"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
        >
            Añadir tarea
        </button>
    </div>

    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-center items-center bg-blue-100 gap-2"
    >
        <div
            v-for="note in notes"
            :key="note.id"
            class="w-full p-4 rounded-lg"
        >
            <div class="flex flex-col gap-5 bg-white p-6 rounded-lg shadow-lg">
                <div class="flex justify-between gap-4">
                    <div v-if="note.category === 'Social'"
                        class="w-fit border p-1 border-blue-500 rounded-lg flex items-center justify-between gap-1"
                    >
                        <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                        <span>{{ note.category }}</span>
                    </div>
                    <div v-else-if="note.category === 'Estudio'"
                        class="w-fit border p-1 border-yellow-500 rounded-lg flex items-center justify-between gap-1"
                    >
                        <div class="w-4 h-4 bg-yellow-500 rounded-full"></div>
                        <span>{{ note.category }}</span>
                    </div>
                    <div v-else-if="note.category === 'Trabajo'"
                        class="w-fit border p-1 border-green-500 rounded-lg flex items-center justify-between gap-1"
                    >
                        <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                        <span>{{ note.category }}</span>
                    </div>

                    <DropDownBtn :idNote="note.id"/>
                </div>

                <div>
                    <h3 class="text-xl font-semibold">
                        {{ note.title }}
                    </h3>
                    <h3 class="text-lg font-semibold">Usuario: Luis</h3>
                </div>

                <p class="text- text-gray-600">
                    {{ note.description }}
                </p>

                <div v-if="note.image === 'No image'" class="hidden"></div>
                <div v-else class="flex items-center justify-center">
                    <img
                        :src="ourImage(note.image)"
                        class="w-52 h-40 rounded-3xl object-cover"
                        alt="Image"
                    />
                </div>

                <div class="flex flex-col gap-3 text-sm text-gray-500">
                    <span>📅{{ note.started_at }}</span>

                    <div v-if="note.finished_at === null" class="hidden"></div>
                    <div v-else class="text-red-500 font-bold">
                        <h3>Vencimiento: {{ note.finished_at }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import DropDownBtn from "../DropDownBtn.vue";

import { useRouter } from "vue-router";
import { onMounted, ref, computed } from "vue";

const imageUrl = ref("/imagenes/cafe-img.jpg");

const getImageUrl = computed(() => imageUrl.value);

const router = useRouter();

const newNote = () => {
    router.push("/notes/create");
};

const ourImage = (img) => {
    return "/imagenes/" + img;
};

let notes = ref([]);

onMounted(async () => {
    getNotes();
});

const getNotes = async () => {
    let response = await axios.get("/api/notes").then((response) => {
        notes.value = response.data.notes;
    });
};
</script>
