@extends('master')

@section('title', 'Crear usuario')

@section('content')
  <h2>Datos del nuevo usuario</h2>
  <form method="POST" action="">
    <div class="mb-3">
      <label for="name" class="form-label">Nombre:</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
  </form>
  @endsection