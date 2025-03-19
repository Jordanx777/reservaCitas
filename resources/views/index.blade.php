<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Laravel</title>
</head>
<body >
    @if(session('mensaje'))
    <div style="color: green; font-weight: bold;">
        {{ session('mensaje') }}
    </div>
    @endif

    @if(session('nombre'))
    <a class="btn btn-danger btn-sm mx-5" href="{{route('Cerrar')}}" >cerrar sesion</a>
    @endif
    <h1>Bienvenido a Laravel</h1>

    <h3>hola {{session('nombre')}}</h3>
    <a class="btn btn-success btn-sm mx-5" href="{{ route('landing') }}">landing</a> 

    <a class="btn btn-success btn-sm mx-5" href="{{ route('login_html') }}">Login</a>

<form action="{{ route('usuarios.formulario') }}" method="POST">
    @csrf
    <input type="submit" value="formulario">
</form>
</body>
</html>