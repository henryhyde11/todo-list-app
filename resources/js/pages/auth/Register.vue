<template>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
            >
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
                    >
                        Crea una cuenta
                    </h1>
                    <form
                        @submit.prevent="handleSubmit"
                        class="space-y-4 md:space-y-6"
                    >
                        <div>
                            <label
                                for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Nombre</label
                            >
                            <input
                                v-model="name"
                                type="name"
                                name="name"
                                id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            />
                            <span
                                v-if="errors.name"
                                class="text-xs text-red-500"
                                >{{ errors.name }}</span
                            >
                        </div>

                        <div>
                            <label
                                for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Email</label
                            >
                            <input
                                v-model="email"
                                type="email"
                                name="email"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            />
                            <span
                                v-if="errors.email"
                                class="text-xs text-red-500"
                                >{{ errors.email }}</span
                            >
                        </div>

                        <div>
                            <label
                                for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Contraseña</label
                            >
                            <input
                                v-model="password"
                                type="password"
                                name="password"
                                id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            />
                            <span
                                v-if="errors.password"
                                class="text-xs text-red-500"
                                >{{ errors.password }}</span
                            >
                        </div>

                        <div>
                            <label
                                for="confirm-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Confirma tu contraseña</label
                            >
                            <input
                                v-model="password_confirmation"
                                type="password"
                                name="confirm-password"
                                id="confirm-password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            />
                            <span
                                v-if="errors.password_confirmation"
                                class="text-xs text-red-500"
                                >{{ errors.password_confirmation }}</span
                            >
                        </div>

                        <button
                            type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Crear cuenta
                        </button>
                        <p
                            class="text-sm font-light text-gray-500 dark:text-gray-400"
                        >
                            ¿Ya tienes una cuenta?

                            <RouterLink
                                to="/home/login"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                >Inicia aquí</RouterLink
                            >
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import { useStore } from "vuex";
import { useRouter } from "vue-router";

const name = ref("");
const email = ref("");
const password = ref("");
const password_confirmation = ref("");
const errors = ref([]);

const store = useStore();
const router = useRouter();

const handleSubmit = async (response) => {
    try {
        await store.dispatch("register", {
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation: password_confirmation.value,
        });
        router.push({ name: "auth.login" });
    } catch (error) {
        errors.value = error.response.data.errors;
    }
};
</script>
