// rutas web
import { createRouter, createWebHistory } from "vue-router";

// 1.- Definir la rutas de los componentes
import Home from "../components/Home.vue";
import EditarUsuario from "../components/EditarUsuario.vue";
import CrearUsuario from "../components/CrearUsuario.vue";

// 2.- Definir las rutas
const routes = [
    {
        path: "/home",
        name: "home",
        component: Home,
    },
    {
        path: "/agregar-usuario",
        name: "agregar-usuario",
        component: CrearUsuario,
    },
    {
        path: "/editar-usuario/:id",
        name: "editar-usuario",
        component: EditarUsuario,
    },
];

// 3.- Crear la instancia del router y pasarle las rutas
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// 4.- Exportar el router
export default router;
