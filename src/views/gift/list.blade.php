@extends('master')

@section('title', 'Gifts')

@section('content')
<a href="/gift/create" class="btn btn-primary">Crear un regalo</a>
<form action="/gift" method="get" class="col">
  <input type="number" name="filter" step="0.01">
  <input type="submit" class="btn btn-primary" value="Filtrar">
</form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($gifts as $gift)
    @if (isset($_GET['filter']))
      @if ($gift->price >= $_GET['filter'])
        <tr>
          <th scope="row">{{ $gift->id }}</th>
          <td>{{ $gift->name }}</td>
          <td>{{ $gift->price }}</td>
          <td>
            <a class="btn btn-primary" href="/gift/{{ $gift->id }}">Mostrar</a>
          </td>
        </tr>
      @endif
    @else
    <tr>
      <th scope="row">{{ $gift->id }}</th>
      <td>{{ $gift->name }}</td>
      <td>{{ $gift->price }}</td>
      <td>
        <a class="btn btn-primary" href="/gift/{{ $gift->id }}">Mostrar</a>
      </td>
    </tr>
    @endif
  @endforeach
  </tbody>
</table>
@endsection