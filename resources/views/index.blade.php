<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Laravel</title>
</head>
<<<<<<< HEAD

<body>
    <h3>hola</h3>
    <a href="{{ route('usuarios') }}">formulario</a>
    <form action="{{ route('usuarios') }}" method="GET">
        @csrf
        <input type="submit" value="formularioq">
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Signed in successfully"
            });
        </script>
    </form>
=======
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
    <form action="{{ route('landing') }}" method="get">
    @csrf
    <input type="submit" value="Landing">
    </form> 

    <a class="btn btn-success btn-sm mx-5" href="{{ route('login_html') }}">Login</a>

<form action="{{ route('usuarios.formulario') }}" method="POST">
    @csrf
    <input type="submit" value="formulario">
</form>
<form action="{{ route('Usuarios.mostrar') }}" method="get">
    @csrf
    <input type="submit" value="Usuarios">
</form>
<form action="{{ route('Principal') }}" method="post">
    @csrf
    <input type="submit" value="inicio">
</form>
>>>>>>> ecf208b10706ba78eeca50dfa7efcfe634b12bbb
</body>

</html>