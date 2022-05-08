<template>
    <FormularioUsuario
        @send="guardar"
        :usuario="usuario"
        btn-text="Editar"
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
            usuario: {},
            base_url: "",
        };
    },
    methods: {
        guardar(usuario) {
            axios
                .put(`${this.base_url}/api/users/update/${usuario.id}`, usuario)
                .then((response) => {
                    // console.log(response);
                    Swal.fire({
                        title: "¡Actualizado!",
                        text: "El usuario ha sido actualizado correctamente",
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
        getDatosUsuario() {
            // obtener el id del parametro url
            let id = this.$route.params.id;

            axios.get(`${this.base_url}/api/users/${id}`).then((response) => {
                // console.log(response.data);
                this.usuario = response.data;
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
        this.getDatosUsuario();
    },
};
</script>
