<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    @if(session('mensaje'))
    <div style="color: green; font-weight: bold;">
        {{ session('mensaje') }}
    </div>
@endif
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            @if(session('nombre'))
            <a class="btn btn-danger btn-sm mx-5" href="{{route('Cerrar')}}" >cerrar sesion</a>
            <strong class="navbar-brand" href="#">hola {{session('nombre')}}</strong>
            @else
            @endif
            <a class="navbar-brand" href="#"> Bienvenido a ...</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Inicio</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <h1>en construccion...</h1>
        <p>...</p>
        <a href="#contacto" class="btn btn-light">Contáctanos</a>
    </header>

    <!-- Servicios -->
    <section id="servicios" class="container my-5">
        <h2 class="text-center">Nuestros Servicios</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <h4>...</h4>
                <p>Gran variedad de medicamentos de calidad.</p>
            </div>
            <div class="col-md-4">
                <h4>...</h4>
                <p>Profesionales dispuestos a asesorarte.</p>
            </div>
            <div class="col-md-4">
                <h4>...</h4>
                <p>Recibe tus productos sin salir de casa.</p>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Contáctanos</h2>
            <form>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mensaje</label>
                    <textarea class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>

    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2025 "". Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
