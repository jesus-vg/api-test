require("./bootstrap");

// Agregamos vue3
import { createApp } from "vue";

const app = createApp({});

app.component(
    "pagina-inicio",
    require("./components/PaginaInicio.vue").default
);

app.mount("#app");
