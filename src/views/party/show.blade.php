@extends('master')

@section('title', 'Detalles de ' . $party->name)

@section('content')
  <h2>{{$party->admin_id}}</h2>
  <div class="row">
    <a href="/party/{{$party->id}}/edit" class="bnt btn-primary col">Editar</a>
    <form method="POST" action="/party/{{$party->id}}" class="col">
      <input type="hidden" name="_METHOD" value="DELETE">
      <input type="submit" value="Borrar" class="btn btn-danger">
    </form>
    <a href="/party" class="bnt btn-primary col">Listado de usuarios</a>
  </div>
  @endsection