<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	<meta
		http-equiv="X-UA-Compatible"
		content="ie=edge"
	>
	<title>Home API vue</title>
	<!-- Fonts -->
	<link
		rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
	>

	<!-- Styles -->
	<link
		rel="stylesheet"
		href="{{ asset('css/app.css') }}"
	>

	<!-- Scripts -->
	<script
	 src="{{ asset('js/app.js') }}"
	 defer
	></script>
	<base href="{{ config('app.url', './') }}">

</head>

<body
	class="my-0 mx-auto flex min-h-screen flex-col bg-slate-200 text-gray-600"
	id="app"
>
	<pagina-inicio></pagina-inicio>
</body>

</html>
