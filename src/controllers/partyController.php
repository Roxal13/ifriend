<?php
namespace Dsw\Ifriend\Controllers;

require_once('../src/connection.php');

use Dsw\Ifriend\models\Assignment;
use Dsw\Ifriend\models\Party;
use Dsw\Ifriend\models\User;

class partyController
{
  // Display a listing of the resource.
  public function index()
  {
    // Obtener los datos del modelo;
    $parties = Party::all();
    // Llamo a la plantilla y le paso los datos
    global $blade;
    echo $blade->view()->make('party.list', compact('parties'))->render();
  }

  // Show the form for creating a new resource.
  public function create()
  {
    $users = User::all();
    global $blade;
    echo $blade->view()->make('party.create', compact('users'))->render();
  }

  // Store a newly created resource in storage.
  public function store()
  {
    $name = $_POST['name'];
    $party = new Party;
    $party->name = $name;
    $party->admin_id = $_SESSION['id'];

    $party->save();
    $participants = $_POST['participants'];
    for($i=0; $i<count($participants); $i++) {
      $assignment = new Assignment();
      $assignment->party_id = $party->id;
      $assignment->user_from = $party->admin_id;
      $assignment->user_to = $participants[$i];
      $assignment->save();
    }
    header('location: /party');
  }

  // Display the specified resource.
  public function show($param)
  {
    $id = $param['id'];
    $party = Party::find($id);
    if ($party) {
      global $blade;
      echo $blade->view()->make('party.show', compact('party'))->render();
    } else {
      echo "<h2>Usuario no encontrado</h2>";
    }
  }

  //Show the form for editing the specified resource.
  public function edit($param)
  {
    $id = $param['id'];
    $party = Party::find($id);
    if ($party) {
      global $blade;
      echo $blade->view()->make('party.edit', compact('party'))->render();
    } else {
      echo "<h2>Party no encontrado</h2>";
    }
  }

  //Update the specified resource in storage.
  public function update($param)
  {
    $id = $param['id'];
    $party = Party::find($id);
    $party->name = $_POST['name'];
    $party->save();
    header('location: /party');
  }

  //Remove the specified resource from storage.
  public function destroy($param)
  {
    $id = $param['id'];
    $party = Party::find($id);
    $party->delete();
    header('location: /party');
  }
}
