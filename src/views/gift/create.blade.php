@extends('master')

@section('title', 'Crear regalo')

@section('content')
  <h2>Datos del nuevo regalo</h2>
  <form method="POST" action="">
    <div class="mb-3">
      <label for="name" class="form-label">Nombre:</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Precio:</label>
      <input type="number" step="0.01" class="form-control" id="price" name="price">
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
  </form>
  @endsection