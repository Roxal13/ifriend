@extends('master')

@section('title', 'Listado de partidas')

@section('content')
<a href="/party/create" class="btn btn-primary">Crear usuario</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Propietario</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($parties as $party)
    <tr>
      <th scope="row">{{ $party->id }}</th>
      <td>{{ $party->name }}</td>
      <td>{{ $party->admin_id }}</td>
      <td>
        <a class="btn btn-primary" href="/party/{{ $party->id }}">Mostrar</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection