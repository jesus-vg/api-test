<template>
	<nav aria-label="Page navigation example" class="text-center py-5">
		<ul class="inline-flex rounded overflow-hidden">
			<li v-for="(link, i) in getLinks" :key="i">
				<button
					class="py-2 px-3 leading-tight border border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white"
					:class="[
						{ 'bg-gray-700': link.active },
						{ 'bg-gray-800': !link.active },
						{
							'hidden md:inline': !(
								i === 0 || i === getLinks.length - 1
							),
						},
					]"
					:disabled="link.active || link.url === null"
					@click="$emit('verPagina', link.url)"
				>
					<span v-html="link.label"></span>
				</button>
			</li>
		</ul>
	</nav>
</template>

<script>
export default {
	props: {
		datosPaginacion: {
			type: Object,
			required: true,
		},
	},
	data() {
		return {
			links: this.datosPaginacion.links,
		};
	},
	computed: {
		getLinks() {
			return this.datosPaginacion.links;
		},
	},
};
</script>
