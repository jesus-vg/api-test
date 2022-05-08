require("./bootstrap");

// Agregamos vue3
import { createApp } from "vue";
import router from "./router";

const app = createApp({});
app.use(router);

app.component(
    "pagina-inicio",
    require("./components/PaginaInicio.vue").default
);

app.mount("#app");
