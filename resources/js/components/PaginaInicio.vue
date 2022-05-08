<template>
	<Cabecera></Cabecera>
	<main class="flex-1" id="app">
		<div class="m-auto py-10 px-2 lg:max-w-6xl">
			<router-view></router-view>
		</div>
	</main>
	<Footer></Footer>
</template>

<script>
import Cabecera from "./Cabecera";
import Footer from "./Footer";

export default {
	components: {
		Cabecera,
		Footer,
	},
};
</script>
