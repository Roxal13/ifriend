<?php
namespace Dsw\Ifriend\Controllers;

require_once('../src/connection.php');

use Dsw\Ifriend\models\Gift;

class giftController
{
  // Display a listing of the resource.
  public function index()
  {
    // Obtener los datos del modelo;
    $gifts = Gift::all();
    // Llamo a la plantilla y le paso los datos
    global $blade;
    echo $blade->view()->make('gift.list', compact('gifts'))->render();
  }

  // Display the specified resource.
  public function show($param)
  {
    $id = $param['id'];
    $gift = Gift::find($id);
    if ($gift) {
      global $blade;
      echo $blade->view()->make('gift.show', compact('gift'))->render();
    } else {
      echo "<h2>Usuario no encontrado</h2>";
    }
  }

  // Store a newly created resource in storage.
  public function store()
  {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $gift = new Gift;
    $gift->name = $name;
    $gift->price = $price;

    $gift->save();
    header('location: /gift');
  }

  //Show the form for editing the specified resource.
  public function edit($param)
  {
    $id = $param['id'];
    $gift = Gift::find($id);
    if ($gift) {
      global $blade;
      echo $blade->view()->make('gift.edit', compact('gift'))->render();
    } else {
      echo "<h2>Regalo no encontrado</h2>";
    }
  }

  //Update the specified resource in storage.
  public function update($param)
  {
    $id = $param['id'];
    $gift = Gift::find($id);
    $gift->name = $_POST['name'];
    $gift->price = $_POST['price'];
    $gift->save();
    header('location: /gift');
  }

  //Remove the specified resource from storage.
  public function destroy($param)
  {
    $id = $param['id'];
    $gift = Gift::find($id);
    $gift->delete();
    header('location: /gift');
  }

}