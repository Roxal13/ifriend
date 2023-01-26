<?php
namespace Dsw\Ifriend\Controllers;

require_once('../src/connection.php');

use Dsw\Ifriend\models\User;
use Illuminate\Support\Facades\Redirect;

class userController
{
  // Display a listing of the resource.
  public function index()
  {
    // Obtener los datos del modelo;
    $users = User::all();
    // Llamo a la plantilla y le paso los datos
    global $blade;
    echo $blade->view()->make('user.list', compact('users'))->render();
  }

  // Show the form for creating a new resource.
  public function create()
  {
    global $blade;
    echo $blade->view()->make('user.create')->render();
  }

  // Store a newly created resource in storage.
  public function store()
  {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $user = new User;
    $user->name = $name;
    $user->password = $password;

    $user->save();
    header('location: /user');
  }

  // Display the specified resource.
  public function show($param)
  {
    $id = $param['id'];
    $user = User::find($id);
    if ($user) {
      global $blade;
      echo $blade->view()->make('user.show', compact('user'))->render();
    } else {
      echo "<h2>Usuario no encontrado</h2>";
    }
  }

  //Show the form for editing the specified resource.
  public function edit($param)
  {
    $id = $param['id'];
    $user = User::find($id);
    if ($user) {
      global $blade;
      echo $blade->view()->make('user.edit', compact('user'))->render();
    } else {
      echo "<h2>Usuario no encontrado</h2>";
    }
  }

  //Update the specified resource in storage.
  public function update($param)
  {
    $id = $param['id'];
    $user = User::find($id);
    $user->name = $_POST['name'];
    $user->password = $_POST['password'];
    $user->save();
    header('location: /user');
  }

  //Remove the specified resource from storage.
  public function destroy($param)
  {
    $id = $param['id'];
    $user = User::find($id);
    $user->delete();
    header('location: /user');
  }
}
