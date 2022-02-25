<?php
require_once 'DB_ini.php';

$db = get_db();

if(isset($_POST['register']))
{
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $user = [
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'hash' => $hash,
    ];
    $query = [
        'username' => $username,
    ];

    if($result = $db->users->find($query)->toArray())
    {      
        header("Location: register_view.php?register=invalid");             
        exit();
    }
    else
    {
        $db->users->insertOne($user);
        header("Location: login_view.php?registrationsucceed");
        die();
    }
}

?>