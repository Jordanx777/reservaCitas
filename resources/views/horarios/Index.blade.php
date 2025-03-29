@extends('layouts.menu')
@section('titulo', 'horarios')
@section('contenido')
<div class="container">
    <h2 class="text-center">Lista de Horarios </h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="horariosTable">

        </tbody>
    </table>
</div>
@push('scripts')
    <script src="{{asset('js/horarios.js')}}"></script>
@endpush
@endsection