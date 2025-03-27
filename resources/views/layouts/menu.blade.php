<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo ?? '...' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @stack('estilos')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            @if(session('nombre'))
            <a class="btn btn-danger btn-sm mx-5" href="{{route('Cerrar')}}" >cerrar sesion</a>
            <strong class="navbar-brand" href="#">hola {{session('nombre')}}</strong>
            @else
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('Usuarios.Perfil')}}">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login_html')}}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('Usuarios.mostrar')}}">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Inicio</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    @if(session('mensaje'))
    <div style="color: {{session('color')}}; font-weight: bold;">
        <script>
            @if(session('mensaje'))
                Swal.fire({
                    icon: "{{ session('icon') }}",
                    title: "{{ session('title') }}",
                    text: "{{ session('mensaje') }} {{session('nombreBienvenida')}}"
                });
            @endif
        </script>
    </div>
@endif

    <div class="container my-4">
        @yield('contenido')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>