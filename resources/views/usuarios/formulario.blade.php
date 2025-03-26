@extends('layouts.menu')
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Registro de Clientes</h4>
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
                    <form  action="{{route('usuarios.registrar')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input id="nombre" type="text" name="nombre" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label for="apellido" class="form-label">Apellidos</label>
                            <input id="apellido" type="text" name="apellidos" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label for="edad" class="form-label">Edad</label>
                            <input id="edad" type="text" name="edad" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label for="telefono" class="form-label">Número Telefónico</label>
                            <input id="telefono" type="text" name="telefono" class="form-control" required>
                        </div>
                        
                        <div class="mb-2">
                            <label for="rol" class="form-label">Rol</label>
                            <select id="rol" name="rol" class="form-select" required>
                                @if (session('cargo')== 1)
                                @foreach($roles as $valor)
                                    {{-- <option value="{{ session('rol') }}">{{ session('rol') }}</option> --}}
                                    <option value="{{ $valor->id }}">{{ $valor->descripcion }}</option>
                                @endforeach
                                @else
                                @foreach($roles as $valor)
                                        @if($valor->descripcion == 'Usuario') 
                                            <option value="{{ $valor->id }}">{{ $valor->descripcion }}</option>
                                        @endif
                                    @endforeach
                                @endif
                                @foreach($roles as $valor )
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input id="correo" type="email" name="correo" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input id="contraseña" type="password" name="contraseña" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label for="confirmar_contraseña" class="form-label">Confirmar Contraseña</label>
                            <input id="confirmar_contraseña" type="password" name="contraseña_confirmation" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container center-align">
        <form action="{{route('index')}}" onsubmit="showLoading()" method="get">
            <button class="btn-flat waves-effect">
                <i class="material-icons left">Inicio</i> 
            </button>
        </form>
    </div>
</div>
@endsection