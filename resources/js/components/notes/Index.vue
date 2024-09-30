<template>
    <div class="w-fit container mx-auto p-8">
        <div class="flex items-center justify-between gap-4 mb-4">
            <h1 class="text-3xl font-bold text-center">Resumen de tareas</h1>

            <button
                type="button"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            >
                Añadir tarea
            </button>
        </div>

        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-center items-center bg-blue-100 gap-2"
        >
            <div class="max-w-sm p-4 rounded-lg">
                <div
                    class="flex flex-col gap-5 bg-white p-6 rounded-lg shadow-lg"
                >
                    <div class="flex justify-between">
                        <div
                            class="w-fit border p-1 border-blue-500 rounded-lg flex items-center justify-between gap-1"
                        >
                            <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                            <span>Etiqueta</span>
                        </div>

                        <DropDownBtn />
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold">
                            Título: Company website redesign
                        </h3>
                        <h3 class="text-lg font-semibold">Usuario: Luis</h3>
                    </div>

                    <p class="text- text-gray-600">
                        Descripción: DesLorem ipsum dolor sit amet, consectetur
                        adipiscing elit. DesLorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                    </p>

                    <div>
                        <img
                            :src="getImageUrl"
                            class="w-full h-40 rounded-3xl object-cover"
                            alt="Café"
                        />
                    </div>

                    <div
                        class="flex items-center justify-between text-sm text-gray-500"
                    >
                        <div>
                            <span>📅Fecha de creación: 7 Sept, 23:00</span>
                        </div>

                        <div class="text-red-500 font-bold">
                            <h3>Vencimiento: Two days ago</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-sm p-4 rounded-lg">
                <div
                    class="flex flex-col gap-5 bg-white p-6 rounded-lg shadow-lg"
                >
                    <div
                        class="w-fit border p-1 border-blue-500 rounded-lg flex items-center justify-between gap-1"
                    >
                        <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                        <span>Etiqueta</span>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold">
                            Título: Company website redesign
                        </h3>
                        <h3 class="text-lg font-semibold">Usuario: Luis</h3>
                    </div>

                    <p class="text- text-gray-600">
                        Descripción: DesLorem ipsum dolor sit amet, consectetur
                        adipiscing elit. DesLorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                    </p>

                    <!-- <div>
                        <img
                            :src="getImageUrl"
                            class="w-full h-40 rounded-3xl object-cover"
                            alt="Café"
                        />
                    </div> -->

                    <div
                        class="flex items-center justify-between text-sm text-gray-500"
                    >
                        <div>
                            <span>📅Fecha de creación: 7 Sept, 23:00</span>
                        </div>

                        <div class="text-red-500 font-bold">
                            <h3>Vencimiento: Two days ago</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-sm p-4 rounded-lg">
                <div
                    class="flex flex-col gap-5 bg-white p-6 rounded-lg shadow-lg"
                >
                    <div
                        class="w-fit border p-1 border-blue-500 rounded-lg flex items-center justify-between gap-1"
                    >
                        <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                        <span>Etiqueta</span>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold">
                            Título: Company website redesign
                        </h3>
                        <h3 class="text-lg font-semibold">Usuario: Luis</h3>
                    </div>

                    <p class="text- text-gray-600">
                        Descripción: DesLorem ipsum dolor sit amet, consectetur
                        adipiscing elit. DesLorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                    </p>

                    <div>
                        <img
                            :src="getImageUrl"
                            class="w-full h-40 rounded-3xl object-cover"
                            alt="Café"
                        />
                    </div>

                    <div
                        class="flex items-center justify-between text-sm text-gray-500"
                    >
                        <div>
                            <span>📅Fecha de creación: 7 Sept, 23:00</span>
                        </div>

                        <div class="text-red-500 font-bold">
                            <h3>Vencimiento: Two days ago</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-sm p-4 rounded-lg">
                <div
                    class="flex flex-col gap-5 bg-white p-6 rounded-lg shadow-lg"
                >
                    <div
                        class="w-fit border p-1 border-blue-500 rounded-lg flex items-center justify-between gap-1"
                    >
                        <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                        <span>Etiqueta</span>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold">
                            Título: Company website redesign
                        </h3>
                        <h3 class="text-lg font-semibold">Usuario: Luis</h3>
                    </div>

                    <p class="text- text-gray-600">
                        Descripción: DesLorem ipsum dolor sit amet, consectetur
                        adipiscing elit. DesLorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                    </p>

                    <div>
                        <img
                            :src="getImageUrl"
                            class="w-full h-40 rounded-3xl object-cover"
                            alt="Café"
                        />
                    </div>

                    <div
                        class="flex items-center justify-between text-sm text-gray-500"
                    >
                        <div>
                            <span>📅Fecha de creación: 7 Sept, 23:00</span>
                        </div>

                        <div class="text-red-500 font-bold">
                            <h3>Vencimiento: Two days ago</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DropDownBtn from "../DropDownBtn.vue";

export default {
    data() {
        return {
            imageUrl: "/imagenes/cafe-img.jpg",
        };
    },
    computed: {
        getImageUrl() {
            return this.imageUrl;
        },
    },
    name: "ParentComponent",
    components: { DropDownBtn },
};
</script>
