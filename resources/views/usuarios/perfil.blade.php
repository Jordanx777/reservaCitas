@extends('layouts.menu')
@section('titulo', 'Perfil de Usuario')

@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger">
        <h4>Errores de Validación:</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5" >
    <h1 class="text-center">Perfil de Usuario</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Información del Usuario</h5>
            @if(session('nombre'))
            {{-- <div class="col-md-5 p-3">
                <strong>Imagen:</strong>
                <img src=" {{asset('storage')}}/{{ $foto }}" class="card-img-top" alt="{{ $nombre }}" height="150" width="25">
            </div> --}}
                <p><strong>Identificador:</strong> {{  $id }}</p>
                <p><strong>Nombre:</strong> {{ $nombre }}</p>
                <p><strong>Apellido:</strong> {{ $apellidos }}</p>
                <p><strong>Teléfono:</strong> {{ $telefono}}</p>
                <p><strong>Edad:</strong> {{ $edad}}</p>
                <p><strong>Fecha de creacion :</strong> {{ $fecha_creacion}}</p>
                <p><strong>Fecha de actualizacion :</strong> {{ $fecha_actualizacion}}</p>
                <p><strong>Cargo:</strong> {{ $descripcion}}</p>
                {{-- <p><strong>Rol:</strong> {{ $cargo_id}}</p> --}}
                <p><strong>Correo:</strong> {{ $correo}}</p>
            @else
                <p>Los datos del usuario no están disponibles.</p>
            @endif
            <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Editar</button>
                <form action="{{route('Cerrar')}}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Edición -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('Usuarios.Actualizar_Perfil',$id)}}" method="POST" class="modal-content">
            @csrf
            @method('put')
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', session('nombre') ?? $nombre) }}" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellidos" value="{{ old('apellidos', session('apellidos')) }}" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', session('telefono')) }}" required>
                </div>
                <div class="mb-3">
                    <label for="Edad" class="form-label">Edad</label>
                    <input type="text" class="form-control" id="Edad" name="edad" value="{{ old('edad', session('edad')) }}" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo', session('correo')) }}" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Dejar en blanco para no cambiar">
                </div>
                <div class="mb-3">
                    <label for="contraseña_confirmation" class="form-label">Comfirmar Contraseña</label>
                    <input type="password" class="form-control" id="contraseña_confirmation" name="contraseña_confirmation" placeholder="Dejar en blanco para no cambiar">
                </div>

                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo</label>
                    @if(session('nombre') && session('descripcion') == 'Administrador')
                        <select class="form-select" name="cargo" required>
                            @foreach ($cargos as $roles)
                                <option value="{{ $roles->id }}" {{ old('cargo', $descripcion) == $roles->id ? 'selected' : '' }}>{{ $roles->descripcion }}</option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" class="form-control" value="{{ $descripcion }}" disabled>
                        <input type="hidden" name="cargo" value="{{ $cargo_id }}">
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<div class="text-center my-4">
    <a href="{{ route('usuarios.formulario') }}" class="btn btn-outline-secondary">Agregar Usuario</a>
</div>

<div class="text-center">
    <a href="{{ route('index') }}" class="btn btn-outline-secondary">Volver al inicio</a>
</div>
@endsection