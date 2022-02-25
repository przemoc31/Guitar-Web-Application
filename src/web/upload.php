<?php
session_start(); 
require_once 'DB_ini.php';
include_once 'functions.php';

$db = get_db();

if(isset($_POST['submit']))
{
    if(!empty($_POST['watermark']))
    {
        $watermarkText = $_POST['watermark'];
    }
    else
    {
        header("Location: galeria.php?watermark=empty");
        die();
    }
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileDestination = 'uploaded_images/'.$fileName;
    $fileType = pathinfo($fileDestination, PATHINFO_EXTENSION);
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    if(isset($_POST['status']))
    $fileStatus = $_POST['status'];
    else
    $fileStatus = "publiczne";

    if(isset($_SESSION["username"]))
    $fileOwner = $_SESSION["username"];
    else
    $fileOwner = NULL;

    if (!empty($_POST['title']))
    {    
        $fileTitle = $_POST['title'];
    }
    else
    {
        $fileTitle = "Undefined";
    }   
    if (!empty($_POST['author']))
    {
        $fileAuthor = $_POST['author'];
    }
    else
    {
        $fileAuthor = "Undefined";
    } 

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png');

    

    if(in_array($fileActualExt, $allowed))
    {
        if ($fileError === 0)
        {
            if ($fileSize <= 1000000)
            {
                if(move_uploaded_file($fileTmpName, $fileDestination))
                {
                    $image = [
                        'name' => $fileName,
                        'title' => $fileTitle,
                        'author' => $fileAuthor,
                        'status' => $fileStatus,
                        'owner' => $fileOwner,
                    ];
                    $db->images->insertOne($image); 

                    create_thumbnail($fileDestination, 'uploaded_images/thumbnail_'.$fileName, 200, 125);

                    switch($fileType)
                    {
                        case 'jpg':
                            $im = imagecreatefromjpeg($fileDestination);
                            break;
                        case 'png':
                            $im = imagecreatefrompng($fileDestination);
                            break;
                    }
                    $stamp = imagecreatetruecolor(100, 70);
                    imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
                    imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
                    imagestring($stamp, 5, 20, 20, 'libGD', 0x0000FF);
                    imagestring($stamp, 3, 20, 40, $watermarkText, 0x0000FF);

                    $marge_right = 10;
                    $marge_bottom = 10;
                    $sx = imagesx($stamp);
                    $sy = imagesy($stamp);

                    // Merge the stamp onto our photo with an opacity of 50%
                    imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 100);

                    // Save the image to file and free memory
                    imagepng($im, 'uploaded_images/watermark_'.$fileName);
                    imagedestroy($im);  
    
                    header("Location: galeria.php?uploadsucceed");
                } 
                else
                {
                    echo "Problem with moving file to folder";
                }             
            }
            else
            {
                echo "This file's size is too big!";
            }
        }
        else
        {
            echo "This file is already uploaded!";
        }
    }
    else
    {
        echo "Invalid Extension!";
    }
}

?>