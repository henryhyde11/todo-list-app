<template>
    <header
        class="w-full bg-white shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700"
    >
        <nav class="border-b-2 border-slate-900">
            <div
                class="flex flex-wrap justify-between items-center mx-auto p-4"
            >
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                    >To Do</span
                >

                <div class="flex gap-5">
                    <div
                        class="flex items-center space-x-6 rtl:space-x-reverse"
                    >
                        <RouterLink
                            to="/home/login"
                            class="text-md text-white hover:underline"
                            >Iniciar sesión</RouterLink
                        >
                    </div>
                    
                    <div
                        class="flex items-center space-x-6 rtl:space-x-reverse"
                    >
                        <RouterLink
                            to="/home/register"
                            class="text-md text-white hover:underline"
                            >Registrarse</RouterLink
                        >
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>
