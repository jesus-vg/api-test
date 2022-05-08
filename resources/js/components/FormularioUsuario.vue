<template>
	<form @submit.prevent="guardar" class="max-w-xl mx-auto">
		<div class="mb-6">
			<label for="nombre" class="label">Nombre:</label>
			<input
				type="text"
				id="nombre"
				class="input-form"
				placeholder="Tu nombre"
				required=""
				v-model.trim="datosUsuario.nombre"
				autofocus
			/>
		</div>
		<div class="mb-6">
			<label for="apellidos" class="label">Tus apellidos:</label>
			<input
				type="text"
				id="apellidos"
				class="input-form"
				required=""
				v-model.trim="datosUsuario.apellido"
			/>
		</div>
		<div class="mb-6">
			<label for="edad" class="label">Tu edad:</label>
			<input
				type="number"
				id="edad"
				class="input-form"
				required=""
				min="0"
				max="127"
				step="1"
				v-model.number="datosUsuario.edad"
			/>
		</div>
		<button type="submit" class="btn-primary">
			{{ btnText }}
		</button>
	</form>
</template>

<script>
export default {
	props: {
		usuario: {
			type: Object,
			default: {},
		},
		btnText: {
			type: String,
			default: "Agregar",
		},
	},
	methods: {
		guardar() {
			this.$emit("send", this.datosUsuario);
		},
	},
	computed: {
		datosUsuario() {
			return this.usuario;
		},
	},
};
</script>
