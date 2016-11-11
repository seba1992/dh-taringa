<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
        
	<title>@yield('title', 'Taringa!')</title>

	{{-- 
		En lugar de usar yield, lo defino como una seccion con @section y @show por si tuviera la necesidad de pisar completamente los estilos en alguna de mis vistas 
	--}}
	@section('head')
		<link rel="stylesheet" href="css/base.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	@show
</head>
<body>
    @include('navbar')

	<div class="container">
		@yield('content')
	</div>
</body>
</html>