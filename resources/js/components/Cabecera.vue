<template>
    <nav
        class="rounded border-gray-200 bg-white px-2 py-2.5 dark:bg-gray-800 sm:px-4"
    >
        <div
            class="container mx-auto flex flex-wrap items-center justify-between"
        >
            <a href="#" class="flex items-center">
                <span
                    class="self-center whitespace-nowrap text-xl font-semibold dark:text-white"
                    >API test</span
                >
            </a>
            <div class="w-full md:block md:w-auto" id="mobile-menu">
                <ul
                    class="mt-4 flex flex-col md:mt-0 md:flex-row md:space-x-8 md:text-sm md:font-medium"
                >
                    <li>
                        <router-link
                            class="block rounded py-2 pr-4 pl-3 text-white md:p-0"
                            :to="{ name: 'home' }"
                            >Usuarios</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            class="block rounded py-2 pr-4 pl-3 text-white md:p-0"
                            :to="{ name: 'agregar-usuario' }"
                            >Agregar</router-link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {};
</script>
