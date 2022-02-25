<?php

include_once 'DB_ini.php';
$db =  get_db();

$images = $db->images->find();   
$users = $db->users->find();   

echo "<h3>Images</h3>";
foreach ($images as $image) {
   // $db->images->deleteOne($image);
 echo "title: ".$image['title']."<br/>";
 echo "author: ".$image['author']."<br/>";
 echo "status: ".$image['status']."<br/>";
 echo "owner: ".$image['owner']."<br/><br/>";
}

echo "<h3>Users</h3>";
foreach ($users as $user) {
   // $db->images->deleteOne($image);
 echo "email: ".$user['email']."<br/>";
 echo "username: ".$user['username']."<br/>";
 echo "password: ".$user['password']."<br/>";
 echo "hash: ".$user['hash']."<br/><br/>";
}
?>