<template>
    <FormularioUsuario
        @send="guardar"
        :usuario="usuario"
        btn-text="Agregar"
    ></FormularioUsuario>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import FormularioUsuario from "./FormularioUsuario";

export default {
    components: {
        FormularioUsuario,
    },
    data() {
        return {
            usuario: {
                id: 0,
                nombre: "",
                apellido: "",
                edad: 0,
            },
            base_url: "",
        };
    },
    methods: {
        guardar(usuario) {
            console.log(usuario);
            axios
                .post(`${this.base_url}/api/users/new`, usuario)
                .then((response) => {
                    // console.log(response);
                    Swal.fire({
                        title: "¡Creado!",
                        text: "El usuario ha sido creado correctamente",
                        icon: "success",
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: "btn-primary",
                        },
                    });
                    this.$router.push("/home");
                })
                .catch((error) => {
                    console.log(error);
                    Swal.fire({
                        title: "¡Error!",
                        html: `<p>${error.response.data.message}</p>`,
                        icon: "error",
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: "btn-primary",
                        },
                    });
                });
        },
    },
    mounted() {
        // obtener la ruta base del html
        this.base_url = document.getElementsByTagName("base")[0].href;
        // quitar la ultima / a base url si tiene
        if (this.base_url.slice(-1) == "/") {
            this.base_url = this.base_url.slice(0, -1);
        }
    },
};
</script>
