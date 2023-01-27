@extends('master')

@section('title', 'Editar party')

@section('content')
  <h2>Datos de la partida</h2>
  <form method="POST" action="/gift/{{$gift->id}}">
    <input type="hidden" name="_METHOD" value="PUT">
    <div class="mb-3">
      <label for="name" class="form-label">Nombre:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$gift->name}}">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Precio:</label>
      <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{$gift->price}}">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
  </form>
  @endsection