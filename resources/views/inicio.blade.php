<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?office,desk') no-repeat center center;
            background-size: cover;
            height: 70vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .btn-primary {
            background-color: #4a5568;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2d3748;
        }
        .navbar {
            background-color: #2d3748;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .services {
            background-color: white;
            padding: 50px 0;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Reservas</a>
            @if(session('nombre'))
            <span class="text-white">Bienvenido, {{ session('nombre') }}</span>
            <a class="btn btn-danger btn-sm mx-5" href="{{route('Cerrar')}}" >cerrar sesion</a>
            @endif

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}">Landing</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login_html') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('Usuarios.mostrar') }}">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary text-white" href="#">Reservar Cita</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="hero">
        <div class="overlay container">
            <h1 class="display-5">Gestiona tus citas de manera fácil y rápida</h1>
            <p class="lead">Reserva tu cita en pocos clics, sin complicaciones.</p>
            <a href="#" class="btn btn-primary btn-lg mt-3">Reservar Ahora</a>
        </div>
    </header>

    <!-- SERVICIOS -->
    <section class="services">
        <div class="container text-center">
            <h2 class="mb-4">Nuestros Servicios</h2>
            <div class="row">
                <div class="col-md-4">
                    <h4>Consulta Médica</h4>
                    <p>Agenda una cita con un especialista de salud.</p>
                </div>
                <div class="col-md-4">
                    <h4>Asesoría Legal</h4>
                    <p>Obtén una consulta con expertos legales.</p>
                </div>
                <div class="col-md-4">
                    <h4>Atención Estética</h4>
                    <p>Reserva tratamientos de belleza y bienestar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center p-3">
        © 2025 Reservas. Todos los derechos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
