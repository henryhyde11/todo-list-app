<template>
    <h1 class="text-3xl font-bold text-center mb-5">Crear nueva tarea</h1>

    <section class="max-w-md mx-auto">
        <!-- Title -->
        <div class="relative z-0 w-full mb-5 group">
            <input
                v-model="form.title"
                type="text"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                required
            />
            <label
                for="title"
                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                >Título</label
            >
        </div>

        <!-- Description -->
        <div class="relative z-0 w-full mb-5 group">
            <input
                v-model="form.description"
                type="text"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" "
                required
            />
            <label
                for="description"
                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                >Descripción</label
            >
        </div>

        <!-- Fecha de inicio -->
        <div class="flex items-center mb-5">
            <input
                v-model="form.started_at"
                type="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="Fecha de inicio"
            />

            <span class="mx-4 text-gray-500"></span>

        <!-- Fecha de vencimiento -->

        <input
                v-model="form.finished_at"
                type="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="Fecha de vencimiento"
            />
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
        </div>

        <!-- Etiqueta -->
        <h3 class="text-lg font-semibold mb-4">Seleccione una etiqueta:</h3>

        <div class="mb-5">
            <div class="flex flex-col space-y-2">
                <label class="inline-flex items-center">
                    <input
                        type="radio"
                        value="social"
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
                        value="estudio"
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
                        value="trabajo"
                        v-model="form.category"
                        class="peer"
                    />
                    <div class="flex items-center">
                        <span class="ml-2">Trabajo</span>
                    </div>
                </label>
            </div>
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
import { reactive } from "vue";

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
        image = "/imagenes" + form.image;
    }

    return image;
};

const handleSave = () => {
    axios
        .post("/api/notes", form)
        .then((response) => {
            console.log(response.data); // Para verificar si los datos se están enviando correctamente
        })
        .catch((error) => {
            console.error(error.response.data); // Para depurar el error
        });
};
</script>