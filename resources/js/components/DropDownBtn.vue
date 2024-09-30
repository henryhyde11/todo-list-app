<template>
    <img
        src="/public/icons/tres-puntos.svg"
        id="dropdownLeftEndButton" data-dropdown-toggle="dropdownLeftEnd" data-dropdown-placement="left-end"
        data-dropdown-offset-distance="1" 
        data-dropdown-offset-skidding="70" 
        class="cursor-pointer"
        alt=""
    />

    <div
        id="dropdownLeftEnd"
        class="z-10 hidden border bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700"
    >
        <ul
            class="py-2 text-sm"
            aria-labelledby="dropdownDefaultButton"
        >
            <li>
                <a
                    href="#"
                    class="block px-4 py-2 text-blue-500 hover:bg-gray-100"
                    >Editar</a
                >
            </li>
            <li>
                <a
                    href="#"
                    class="block px-4 py-2 text-red-500 hover:bg-gray-100"
                    >Eliminar</a
                >
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "DropDownBtn",
};
</script>
