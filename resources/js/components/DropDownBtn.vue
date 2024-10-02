<template>
    <div class="relative inline-block text-left" ref="dropdown">
        <div @click="toggleDropdown" class="cursor-pointer">
            <img src="/public/icons/tres-puntos.svg" />
        </div>

        <div
            v-if="isOpen"
            class="origin-top-right absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="options-menu"
        >
            <ul class="py-2 text-sm" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a
                        @click="onEdit(idNote)"
                        class="block px-4 py-2 text-blue-500 hover:bg-gray-100 cursor-pointer"
                        >Editar</a
                    >
                </li>
                <li>
                    <a
                        @click="onDeleteNote(idNote)"
                        class="block px-4 py-2 text-red-500 hover:bg-gray-100 cursor-pointer"
                        >Eliminar</a
                    >
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, defineProps, inject } from "vue";
import { useRouter } from "vue-router";

const isOpen = ref(false);
const dropdown = ref(null);

function toggleDropdown() {
    isOpen.value = !isOpen.value;
}

function handleClickOutside(event) {
    if (dropdown.value && !dropdown.value.contains(event.target)) {
        isOpen.value = false;
    }
}

onMounted(() => {
    window.addEventListener("click", handleClickOutside);
});

onBeforeUnmount(() => {
    window.removeEventListener("click", handleClickOutside);
});

const router = useRouter();

const props = defineProps({
    idNote: {
        type: Number,
        required: true,
    },
});

const onEdit = (id) => {
    router.push(`/notes/${id}/edit`);
};

const getNotes = inject("getNotes");

const onDeleteNote = (id) => {
    Swal.fire({
        title: "¿Desea eliminar esta nota?",
        text: "Esto no se podrá revertir.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/notes/${id}`).then(() => {
                Swal.fire({
                    title: "Eliminado!",
                    text: "Su nota ha sido eliminada.",
                    icon: "success",
                });
            });
        }
        getNotes();
    });
};

const name = "DropDownBtn";
</script>
