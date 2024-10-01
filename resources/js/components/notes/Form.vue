<template>
    <h1 v-if="editMode" class="text-3xl font-bold text-center mb-5">
        Editar tarea
    </h1>
    <h1 v-else class="text-3xl font-bold text-center mb-5">
        Crear nueva tarea
    </h1>

    <section class="max-w-md mx-auto">
        <!-- Title -->
        <div class="relative z-0 w-full mb-5 group">
            <input
                v-model="form.title"
                type="text"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
            />
            <label
                for="title"
                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                >Título</label
            >
            <span v-if="errors.title" class="text-xs text-red-500">{{
                errors.title
            }}</span>
        </div>

        <!-- Description -->
        <div class="relative z-0 w-full mb-5 group">
            <textarea
                v-model="form.description"
                type="text"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
            ></textarea>
            <label
                for="description"
                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                >Descripción</label
            >
            <span v-if="errors.description" class="text-xs text-red-500">{{
                errors.description
            }}</span>
        </div>

        <!-- Fecha de inicio -->
        <div class="grid sm:grid-cols-2 items-end mb-5 gap-5">
            <div>
                <h3 class="text-lg font-semibold mb-4">Fecha de inicio:</h3>

                <input
                    v-model="form.started_at"
                    type="date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                    placeholder="Fecha de inicio"
                />

                <span v-if="errors.started_at" class="text-xs text-red-500">{{
                    errors.started_at
                }}</span>
            </div>

        <!-- Fecha de vencimiento -->
        <div>
                <h3 class="text-lg font-semibold mb-4">
                    Fecha de vencimiento (opcional):
                </h3>

                <input
                    v-model="form.finished_at"
                    type="date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                    placeholder="Fecha de vencimiento"
                />

                <span v-if="errors.finished_at" class="text-xs text-red-500">{{
                    errors.finished_at
                }}</span>
            </div>
        </div>

        <!-- Imagen -->
        <h3 class="text-lg font-semibold mb-4">
            Seleccione una imagen (opcional):
        </h3>

        <div
            class="w-full flex flex-col justify-center items-center gap-5 mb-5"
        >
            <input
                @change="handleFileChange"
                id="dropzone-file"
                type="file"
                class="w-full"
            />

            <img
                :src="getImage()"
                alt="Imagen nota"
                class="w-32 h-32 rounded-3xl object-cover"
            />

            <span v-if="errors.image" class="text-xs text-red-500">{{
                errors.image
            }}</span>
        </div>

        <!-- Etiqueta -->
        <h3 class="text-lg font-semibold mb-4">Seleccione una etiqueta:</h3>

        <div class="mb-5">
            <div class="flex flex-col space-y-2">
                <label class="inline-flex items-center">
                    <input
                        type="radio"
                        value="Social"
                        v-model="form.category"
                        class="peer"
                    />
                    <div class="flex items-center">
                        <span class="ml-2">Social</span>
                    </div>
                </label>

                <label class="inline-flex items-center">
                    <input
                        type="radio"
                        value="Estudio"
                        v-model="form.category"
                        class="peer"
                    />
                    <div class="flex items-center">
                        <span class="ml-2">Estudio</span>
                    </div>
                </label>

                <label class="inline-flex items-center">
                    <input
                        type="radio"
                        value="Trabajo"
                        v-model="form.category"
                        class="peer"
                    />
                    <div class="flex items-center">
                        <span class="ml-2">Trabajo</span>
                    </div>
                </label>
            </div>
            <span v-if="errors.category" class="text-xs text-red-500">{{
                errors.category
            }}</span>
        </div>

        <button
            @click="handleSave"
            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
        >
            Crear nota
        </button>
    </section>
</template>

<script setup>
import { reactive, ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";

const form = reactive({
    title: "",
    description: "",
    started_at: "",
    finished_at: "",
    image: "",
    category: "",
});

const handleFileChange = (e) => {
    let file = e.target.files[0];
    let reader = new FileReader();

    reader.onload = () => {
        form.image = reader.result;
    };

    reader.readAsDataURL(file);
};

const getImage = () => {
    let image = "/icons/upload.svg";

    if (form.image && form.image.indexOf("base64") != -1) {
        image = form.image;
    } else if (form.image) {
        image = "/imagenes/" + form.image;
    }

    return image;
};

const route = useRoute();

const editMode = ref(false);

onMounted(() => {
    if (route.name === "notes.edit") {
        editMode.value = true;
        getNote();
    }
});

const getNote = async () => {
    let response = await axios
        .get(`/api/notes/${route.params.id}/edit`)
        .then((response) => {
            form.title = response.data.note.title;
            form.description = response.data.note.description;
            form.started_at = response.data.note.started_at;
            form.finished_at = response.data.note.finished_at;
            form.category = response.data.note.category;
            form.image = response.data.note.image;
        });
};

const router = useRouter();

let errors = ref([]);

const handleSave = (values, actions) => {
    if (editMode.value) {
        updateNote(values, actions);
    } else {
        createNote(values, actions);
    }
};

const createNote = (values, actions) => {
    axios
        .post("/api/notes", form)
        .then((response) => {
            router.push("/");
            toast.fire({ icon: "success", title: "Nota añadida exitosamente" });
        })
        .catch((error) => {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        });
};

const updateNote = (values, actions) => {
    axios
        .put(`/api/notes/${route.params.id}`, form)
        .then((response) => {
            router.push("/");
            toast.fire({
                icon: "success",
                title: "Nota actualizada exitosamente",
            });
            console.log(response.data);
        })
        .catch((error) => {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
                console.error(error.response);
            }
        });
};
</script>
