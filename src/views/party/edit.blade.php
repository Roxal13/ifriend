@extends('master')

@section('title', 'Editar party')

@section('content')
  <h2>Datos de la partida</h2>
  <form method="POST" action="/party/{{$party->id}}">
    <input type="hidden" name="_METHOD" value="PUT">
    <div class="mb-3">
      <label for="name" class="form-label">Nombre:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$party->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
  </form>
  @endsection