<?php
require_once 'DB_ini.php';

$db = get_db();

if (isset($_POST['submit']))
{
  $username = $_POST['username1'];
  $password = $_POST['password1'];
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $queryUsername = [
    'username' => $username,
  ];
  $queryFull = [
    'username' => $username,
    'password' => $password,
    'hash' => $hash,
  ];

    if($result = $db->users->find($queryUsername)->toArray())
    {
      $dbHash = $result[0]->hash;
      if(password_verify($password, $dbHash))
      {
        session_start();
        $user = $result[0]->username;
        $_SESSION["username"] = $user;
        header("Location: galeria.php?login=successful");
      }
      else
      {
        header("Location: login_view.php?password=wrong");
        die();
      }
      
    }
    else
    {
      header("Location: login_view.php?username=wrong");
      die();
    }
    
    
}
    
?>