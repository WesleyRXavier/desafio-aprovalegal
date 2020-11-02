<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url(mix('css/bootstrap.css')) }}" rel="stylesheet">
    <title>Desafio Aprova Legal</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        crossorigin="anonymous">

<style>
.nav{
padding-bottom: 20px
}</style>


</head>

<body>
    <div class="container">
        <ul class="nav ">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('inicio') }}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('empresas.index') }}">Empresas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('setores.index') }}">Setores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('funcionarios.index') }}">Funcionarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('documentos.index') }}">Documentos</a>
            </li>

        </ul>
        <div>
            @yield('content')


            <script src="{{ url(mix('js/jquey.min.js')) }}"></script>
            <script src="{{ url(mix('js/bootstrap.js')) }}"></script>
</body>

</html>
