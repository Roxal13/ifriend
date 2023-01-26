@extends('master')

@section('title', 'Detalles de ' . $user->name)

@section('content')
  <h2>{{$user->password}}</h2>
  <div class="row">
    <a href="/user/{{$user->id}}/edit" class="bnt btn-primary col">Editar</a>
    <form method="POST" action="/user/{{$user->id}}" class="col">
      <input type="hidden" name="_METHOD" value="DELETE">
      <input type="submit" value="Borrar" class="btn btn-danger">
    </form>
    <a href="/user" class="bnt btn-primary col">Listado de usuarios</a>
  </div>
  @endsection