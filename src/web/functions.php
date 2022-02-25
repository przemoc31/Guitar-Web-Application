<?php
require '../../vendor/autoload.php';

function PIPHP_ImageResize($image, $w, $h)
{
         $oldw = imagesx($image);
         $oldh = imagesy($image);
         $temp = imagecreatetruecolor($w, $h);
         imagecopyresampled($temp, $image, 0, 0, 0, 0,
            $w, $h, $oldw, $oldh);
         return $temp;
}

function ifuserLogged()
{
    if(isset($_SESSION['username']))
    {
      echo '<h3>You are logged in '.$_SESSION['username'].'</h3><br/><br/>';
    }
    else
    {
      echo '<h3>You are logged out</h3><br/><br/>';
    }
}

function loginHide()
{
    if(isset($_SESSION['username']))
                {
                  echo '<a href="logout.php">Wyloguj się</a>';
                }
                else
                {
                  echo '<a href="login_view.php">Zaloguj</a>';
                }
}

function create_thumbnail($path, $save, $width, $height)
{
    $info = getimagesize($path);
    $size = array($info[0], $info[1]);

    if($info['mime'] == 'image/png')
      $src = imagecreatefrompng($path);
    else
      $src = imagecreatefromjpeg($path);

    $thumb = imagecreatetruecolor($width, $height);
    $src_aspect = $size[0] / $size[1];
    $thumb_aspect = $width / $height;

    if ($src_aspect < $thumb_aspect)
    {
      $scale = $width / $size[0];
      $new_size = array($width, $width / $src_aspect);
      $src_pos = array(0, ($size[1] * $scale - $height) / $scale / 2);
    }
    else if ($src_aspect > $thumb_aspect)
    {
      $scale = $height / $size[1];
      $new_size = array($height * $src_aspect, $height);
      $src_pos = array(($size[0] * $scale - $width) / $scale / 2, 0);
    }
    else
    {
      $new_size = array($width, $height);
      $src_pos = array(0, 0);
    }

    $new_size[0] = max($new_size[0], 1);
    $new_size[1] = max($new_size[1], 1);

    imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
    
    if($info['mime'] == 'image/png')
      return imagepng($thumb, $save);
    else
      return imagejpeg($thumb, $save);
}

?>