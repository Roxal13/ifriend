<?php
namespace Dsw\Ifriend\Controllers;

require_once('../src/connection.php');

use Dsw\Ifriend\models\User;

class loginController
{
  public function login()
  {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $user = User::where([['name', $name], ['password', $password]])->first();
    if($user) {
      $_SESSION['id'] = $user->id;
      $_SESSION['name'] = $user->name;
      header('location: /');
    }else {
      echo "Fallo de sesión";
    }
  }

  public function logout() 
  {
    session_destroy();
    header('location: /');
  }
}
