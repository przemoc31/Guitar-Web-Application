<?php

include_once 'DB_ini.php';
include_once 'functions.php';

$db = get_db();
$images_per_page = 5;
$imageCounter = 0;  
if(isset($_SESSION["username"]))
{
  $query = [
    '$or' => [
      ['owner' => NULL],
      ['owner' => $_SESSION["username"]],
    ]
  ];
  $images = $db->images->find($query)->toArray();   
}
else
{
  $query = [
    'status' => "publiczne",
  ];
  $images = $db->images->find($query)->toArray();   
}   
$amount_of_images = sizeof($images);
$amount_of_pages = ceil($amount_of_images/$images_per_page);
$users = $db->users->find();   

if(isset($_POST["page"]))
{
  $page = $_POST["page"];
  $page *= $images_per_page;
}
else
{
  $page = 5;
}
foreach ($images as $image) {
  //  $db->images->deleteOne($image);
  if($imageCounter >= ($page-$images_per_page) && $imageCounter < $page)
  {
    if(isset($_SESSION["username"]))
    {
      if($image['status'] == "prywatne" && $_SESSION["username"] != $image['owner'])
      {
        $imageCounter--;
      }
      else
      {
        echo "<div class='gallery'>
        <a target='_blank' href='uploaded_images/watermark_".$image['name']."'>
            <img src='uploaded_images/thumbnail_".$image['name']."'>
        </a>
        <div class='opis'>".$image['title']."</div>
        <div class='opis2'>".$image['author']."</div>
      </div>";
      }
    }
    else if ($image['status'] == "publiczne")
    {
      echo "<div class='gallery'>
      <a target='_blank' href='uploaded_images/watermark_".$image['name']."'>
          <img src='uploaded_images/thumbnail_".$image['name']."'>
      </a>
      <div class='opis'>".$image['title']."</div>
      <div class='opis2'>".$image['author']."</div>
    </div>";
    }
    
    
  }
  $imageCounter++;
}
echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
?>
<form method="POST">
<?php
for($x = 1; $x <= $amount_of_pages; $x++)
{
  ?>
  <input type="submit" value="<?php echo $x; ?>" name="page">
  <?php
}
//foreach($users as $user)
//{
//    $db->users->deleteOne($user);
//}

?>