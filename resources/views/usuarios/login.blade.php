<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
<link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    @if(session('mensaje'))
    <div style="color: {{session('color')}}; font-weight: bold;">
        {{ session('mensaje') }}
    </div>
    @endif
    <a href="#usuario">¿no tienes cuenta?</a>
    <div class="login-container">
        <div class="login-card">
            <h2 class="text-center">Inicia Sesión</h2>
            {{-- <p class="text-center text-secondary">Conéctate con tus datos</p> --}}
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="correo" class="form-control" placeholder="Correo Electrónico" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
            <a class="link-recuperar" href="">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
    <form id="myForm" action="{{route('usuarios.formulario')}}" onsubmit="showLoading()" method="post">
        @csrf
        <button id="usuario" class="btn btn-outline-secondary" value="agg usuarios">
            <i class="fa-solid fa-user-plus"></i> Agregar usuarios
        </button>
    </form>
    <form id="myForm" action="{{route('index')}}" onsubmit="showLoading()" method="get">
        <button class="btn btn-outline-secondary" value="inicio">
            <i class="fa-solid fa-house"></i> Inicio
        </button>
    </form>
</body>
</html>