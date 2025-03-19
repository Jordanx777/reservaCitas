<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
</head>
<body >
    <h3>hola</h3>
    <a href="{{ route('landing') }}">landing</a>
    <a href="{{ route('login_html') }}">Login</a>
<form action="{{ route('usuarios.formulario') }}" method="POST">
    @csrf
    <input type="submit" value="formulario">
</form>
</body>
</html>