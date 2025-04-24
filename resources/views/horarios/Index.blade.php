@extends('layouts.menu')
@section('titulo', 'horarios')
@section('contenido')
@push('meta')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush
<div class="container">
    <h2 class="text-center">Lista de Horarios </h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Fecha Creacion</th>
                <th>Fecha Actualizacion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="horariosTable">

        </tbody>
    </table>
</div>
@if (session('nombre') && session('cargo')==1)

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalHorario">
  Agregar Horario
</button>
@else 

@endif

<!-- Modal -->
<div class="modal fade" id="modalHorario" tabindex="-1" aria-labelledby="modalHorarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHorarioLabel">Agregar Nuevo Horario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form id="formHorario" >
            @csrf
            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha:</label>
              <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="mb-3">
              <label for="hora" class="form-label">Hora:</label>
              <input type="time" class="form-control" id="hora" name="hora" required>
            </div>
            <button type="button" class="btn btn-success" onclick="AgregarHorario()">Guardar</button>
          </form>
          <div id="mensaje" class="mt-3"></div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalEditarHorario" tabindex="-1" aria-labelledby="modalEditarHorarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarHorarioLabel">Editar Horario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formEditarHorario">
            <input type="hidden" id="editId">
            <div class="mb-3">
              <label for="editFecha" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="editFecha" required>
            </div>
            <div class="mb-3">
              <label for="editHora" class="form-label">Hora</label>
              <input type="time" class="form-control" id="editHora" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="Editar()">Guardar Cambios</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  
@push('scripts')
    <script src="{{asset('js/horarios.js')}}"></script>

    <script>
      
    var usuarioSesion = {
      id_usuario: "{{ session('id') }}",
        nombre: "{{ session('nombre') }}",
        cargo: "{{ session('cargo') }}"
    };

    </script>
@endpush
@endsection