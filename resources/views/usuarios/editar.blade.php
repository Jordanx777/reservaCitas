<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center">Editar Usuario</h3>
        @if (session('mensaje'))
            <div style="color: green; font-weight: bold;">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Editar Usuario</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('Usuarios.modificar',$usuario->id)}}" method="post">
                            @csrf
                            <div class="mb-2">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" type="text" name="nombre" class="form-control"
                                    value="{{ $usuario->nombre }}">
                            </div>
                            <div class="mb-2">
                                <label for="apellido" class="form-label">Apellidos</label>
                                <input id="apellido" type="text" name="apellidos" class="form-control"
                                    value="{{ $usuario->apellidos }}">
                            </div>
                            <div class="mb-2">
                                <label for="edad" class="form-label">Edad</label>
                                <input id="edad" type="text" name="edad" class="form-control"
                                    value="{{ $usuario->edad }}">
                            </div>
                            <div class="mb-2">
                                <label for="telefono" class="form-label">Número Telefónico</label>
                                <input id="telefono" type="text" name="telefono" class="form-control"
                                    value="{{ $usuario->telefono }}">
                            </div>
                            <div class="mb-2">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input id="correo" type="email" name="correo" class="form-control" value="{{ $usuario->correo }}">
                            </div>
                            <div class="mb-2">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input id="contraseña" type="text" name="contraseña" class="form-control" >
                                {{-- value="{{ $usuario->contraseña }}" --}}
                            </div>
                            <div class="mb-2">
                                <label for="comfirm">Comfirmar contraseña</label>
                                <input id="comfirm" type="text" name="contraseña_confirmation" class="form-control">
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-success" type="submit">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2">
        <a href="{{ route('index') }}" class="btn btn-primary">Inicio</a>
    </div>
    <div class="mb-2">
        <a href="{{ route('Usuarios.mostrar') }}" class="btn btn-primary">Regresar</a>
    </div>
</body>

</html>
