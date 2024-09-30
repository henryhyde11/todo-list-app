<template>
    <h1 class="text-3xl font-bold text-center">Crear nueva tarea</h1>

    <form class="max-w-md mx-auto">
        <!-- Title -->
        <div class="relative z-0 w-full mb-5 group">
            <input
                type="text"
                name="title"
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
                type="text"
                name="description"
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
        <div
            id="date-range-picker"
            date-rangepicker
            class="flex items-center mb-5"
        >
            <div class="relative">
                <div
                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                >
                    <img src="/public/icons/calendario.svg" alt="calendario" />
                </div>
                <input
                    id="datepicker-range-start"
                    name="started_at"
                    type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                    placeholder="Fecha de inicio"
                />
            </div>
            <span class="mx-4 text-gray-500"></span>

            <!-- Fecha de vencimiento -->
            <div class="relative">
                <div
                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                >
                    <img src="/public/icons/calendario.svg" alt="calendario" />
                </div>
                <input
                    id="datepicker-range-end"
                    name="finished_at"
                    type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                    placeholder="Fecha de vencimiento"
                />
            </div>
        </div>

        <!-- Imagen -->
        <div class="flex items-center justify-center w-full mb-5">
            <label
                for="dropzone-file"
                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-10"
            >
                <div
                    class="flex flex-col items-center justify-center pt-5 pb-6"
                >
                    <img src="/public/icons/upload.svg" alt="" />
                    <p class="mb-2 text-sm text-gray-500">
                        <span class="font-semibold"
                            >Haz click para subir la imagen</span
                        >
                        o arrástrala y suéltala
                    </p>
                    <p class="text-xs text-gray-500">
                        SVG, PNG, JPG or GIF (MAX. 800x400px)
                    </p>
                </div>
                <input
                    id="dropzone-file"
                    name="image_uri"
                    type="file"
                    class="hidden"
                />
            </label>
        </div>

        <!-- Etiqueta -->
        <div class="flex justify-between mb-5">
            <button
                id="dropdownCheckboxButton"
                data-dropdown-toggle="dropdownDefaultCheckbox"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                type="button"
            >
                Selecciona una etiqueta
                <svg
                    class="w-2.5 h-2.5 ms-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 10 6"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 1 4 4 4-4"
                    />
                </svg>
            </button>

            <div
                id="dropdownDefaultCheckbox"
                class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow"
            >
                <ul
                    class="p-3 space-y-3 text-sm text-gray-700"
                    aria-labelledby="dropdownCheckboxButton"
                >
                    <li>
                        <div class="flex items-center">
                            <input
                                id="checkbox-item-1"
                                type="checkbox"
                                value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                            />
                            <label
                                for="checkbox-item-1"
                                class="ms-2 text-sm font-medium text-gray-900"
                                >Trabajo</label
                            >
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <input
                                id="checkbox-item-2"
                                type="checkbox"
                                value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                            />
                            <label
                                for="checkbox-item-2"
                                class="ms-2 text-sm font-medium text-gray-900"
                                >Social</label
                            >
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <input
                                id="checkbox-item-3"
                                type="checkbox"
                                value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                            />
                            <label
                                for="checkbox-item-3"
                                class="ms-2 text-sm font-medium text-gray-900"
                                >Estudio</label
                            >
                        </div>
                    </li>
                </ul>
            </div>

            <button
                type="submit"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            >
                Crear nota
            </button>
        </div>
    </form>
</template>
