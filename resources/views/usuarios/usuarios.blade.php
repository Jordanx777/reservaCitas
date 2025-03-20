<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if(session('mensaje'))
    <div style="color: {{session('color')}}; font-weight: bold;">
        {{ session('mensaje') }}
    </div>
    @endif


    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-secondary">Gestión de Usuarios</h3>
            @if (session('nombre'))
            <div>
                <span class="me-3">Usuario: <strong>{{ session('nombre') }}</strong></span>
                <form id="myForm" action="{{ route('Cerrar') }}" method="get">
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">
                        <i class="fa-solid fa-house"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
            @endif
        </div>
        <div class="my-4">
            <div class="d-flex align-items-center justify-content-between">
                <!-- Input de búsqueda -->
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="search" id="search" class="form-control" placeholder="Buscar...">
                    </div>
                </div>
                
                <!-- Filtrar por cargo -->
                <div class="ms-3">
                    <h5 class="text-secondary mb-1">Filtrar por cargo:</h5>
                    {{-- <form method="get" action="{{ route('Mostrar') }}">
                        <input type="hidden" id="role" value="{{session('descripcion')}}">
                        <select name="cargo" class="form-select" onchange="this.form.submit()">
                            <option value="">Todos los cargos</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ $filtroCargo == $rol->id ? 'selected' : '' }}>
                                    {{ $rol->descripcion }}
                                </option>
                            @endforeach
                        </select>
                    </form> --}}
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        {{-- <th>ID</th> --}}
                        {{-- <th></th> --}}
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Fecha creacion</th>
                        <th>Acciones</th>
                        </tr>
                </thead>
                <tbody id="resultados-usuarios">
                    @forelse ($usuarios as $usuario)
                        <tr>
                            {{-- <td>{{ $usuario->id }}</td> --}}
                            {{-- <td>{{ $usuario->dni }}</td> --}}
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellidos }}</td>
                            <td>{{ $usuario->telefono }}</td>
                            <td>{{ $usuario->edad }}</td>
                            <td>{{ $usuario->correo }}</td>
                            <td>{{ $usuario->created_at }}</td>
                            <td>
                                {{-- {{ route('Usuarios.editar', $usuario->id) }} --}}
                                <a href="{{route('Usuarios.modificar_html', $usuario->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pencil">M</i>
                                </a>
                                {{-- {{ route('Usuarios.eliminar', $usuario->id) }} --}}
                                <form action="{{route('Usuarios.eliminar',$usuario->id)}}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa-solid fa-trash">E</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No se encontraron usuarios.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <nav aria-label="Paginación">
            <ul class="pagination justify-content-center">
                {{-- @for ($i = 1; $i <= $totalPaginas; $i++)
                    <li class="page-item {{ $i == $paginaActual ? 'active' : '' }}">
                        <a class="page-link" href="{{ route('Mostrar', ['pagina' => $i, 'cargo' => $filtroCargo]) }}">{{ $i }}</a>
                    </li>
                @endfor --}}
            </ul>
        </nav>

        {{-- <div class="text-center my-4">
            <a href="{{route('usuarios.formulario')}}" class="btn btn-outline-secondary">Agregar Usuario</a>
        </div> --}}
        <form id="myForm" action="{{route('usuarios.formulario')}}" onsubmit="showLoading()" method="post">
            @csrf
            <button class="btn btn-outline-secondary" value="agg usuarios">
                <i class="fa-solid fa-user-plus"></i> Agregar usuarios
            </button>
        </form>

        <div class="text-center">
            <a href="{{route('index')}}" class="btn btn-outline-secondary">Volver al inicio</a>
        </div>
    </div>
</body>
</html>