<template>
    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg"
        v-if="usuarios.length > 0"
    >
        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Apellidos</th>
                    <th scope="col" class="px-6 py-3">Edad</th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Opciones</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="border-b bg-gray-800 border-gray-700 odd:bg-gray-800 even:bg-gray-700"
                    v-for="(usuario, id) in usuarios"
                    :key="id"
                >
                    <th
                        scope="row"
                        class="px-6 py-4 font-medium text-white whitespace-nowrap"
                    >
                        {{ usuario.nombre }}
                    </th>
                    <td class="px-6 py-4">{{ usuario.apellido }}</td>
                    <td class="px-6 py-4">{{ usuario.edad }}</td>
                    <td class="px-6 py-4 text-right">
                        <router-link
                            class="font-medium text-green-500 px-2 hover:underline"
                            :to="{
                                name: 'editar-usuario',
                                params: { id: usuario.id },
                            }"
                            >Editar</router-link
                        >
                        <button
                            class="font-medium text-red-500 px-2 hover:underline"
                            @click="eliminar(usuario)"
                        >
                            Eliminar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div
        class="text-center"
        v-if="!usuarios.length > 0 && datosPaginacion.current_page == 1"
    >
        <h1 class="text-gray-400">No hay usuarios registrados</h1>
    </div>
    <div
        class="text-center"
        v-if="!usuarios.length > 0 && datosPaginacion.current_page > 1"
    >
        <h1 class="text-gray-400">
            No hay usuarios para la página {{ datosPaginacion.current_page }}
        </h1>
    </div>

    <paginacion-usuario
        :datosPaginacion="datosPaginacion"
        @ver-pagina="verPagina"
        v-if="
            usuarios.length > 0 ||
            (datosPaginacion.links?.length > 0 &&
                datosPaginacion.current_page > 1)
        "
    ></paginacion-usuario>
</template>

<script>
import Swal from "sweetalert2";
import PaginacionUsuario from "./PaginacionUsuario";

export default {
    components: {
        PaginacionUsuario,
    },
    data() {
        return {
            usuarios: [],
            base_url: "",
            datosPaginacion: {},
            urlConsulta: "",
        };
    },
    methods: {
        /**
         * Elimina el usuario mediante axios, con mensaje de confirmacion con sweetalert2.
         */
        eliminar: function (usuario) {
            Swal.fire({
                title: "¿Estás seguro?",
                html: `¿Seguro que deseas eliminar el usuario <strong>"${usuario.nombre}"</strong>?
				<br><small>Una vez eliminada no se podrá recuperar</small>`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar el usuario",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn-primary",
                    cancelButton: "btn-secondary ml-3",
                },
                iconColor: "#14b8a6",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(
                            `${this.base_url}/api/users/delete/${usuario.id}`
                        )
                        .then((response) => {
                            // console.log(response);
                            Swal.fire({
                                title: "¡Eliminado!",
                                text: "El usuario ha sido eliminado correctamente",
                                icon: "success",
                                buttonsStyling: false,
                                customClass: {
                                    confirmButton: "btn-primary",
                                },
                            });

                            // Actualizamos la lista de usuarios
                            this.getUsuarios();
                        })
                        .catch((error) => {
                            console.log(error);
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al eliminar el usuario",
                                "error"
                            );
                        });
                }
            });
        },
        getUsuarios: function () {
            axios
                .get(this.urlConsulta)
                .then((response) => {
                    // console.log(response);
                    this.usuarios = response.data.data;
                    this.datosPaginacion = response.data;
                })
                .catch((error) => {
                    Swal.fire(
                        "¡Error!",
                        "No se pudo obtener la lista de usuarios.",
                        "error"
                    );
                });
        },
        verPagina: function (url) {
            // URL = http://api-test.test/api/users?usuarios=1 --paginacion
            this.urlConsulta = url;
            this.getUsuarios();
        },
    },
    mounted() {
        // obtener la ruta base del html
        this.base_url = document.getElementsByTagName("base")[0].href;
        // quitar la ultima / a base url si tiene
        if (this.base_url.slice(-1) == "/") {
            this.base_url = this.base_url.slice(0, -1);
        }
        this.urlConsulta = this.base_url + "/api/users";

        // obtener la lista de usuarios
        this.getUsuarios();
    },
};
</script>
