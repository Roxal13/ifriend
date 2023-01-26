@extends('master')

@section('title', 'Listado de usuarios')

@section('content')
<a href="/user/create" class="btn btn-primary">Crear usuario</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Password</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->password }}</td>
      <td>
        <a class="btn btn-primary" href="/user/{{ $user->id }}">Mostrar</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection