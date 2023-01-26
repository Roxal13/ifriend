@extends('master')

@section('title', 'Login')

@section('content')
  <h2>Datos de validación</h2>
  <form method="POST" action="/login">
    <div class="mb-3">
      <label for="name" class="form-label">Nombre:</label>
      <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name">
      <div id="nameHelp" class="form-text">Introduce el nombre de usuario</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input type="password" class="form-control" id="password" aria-describedby="passwHelp" name="password">
      <div id="passwHelp" class="form-text">Introduce la contraseña de usuario</div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
  @endsection