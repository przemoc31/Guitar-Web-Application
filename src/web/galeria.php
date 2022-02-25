<?php session_start(); 
      include_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Moje Hobby</title>

        <script src="script.js"></script>        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="jquery.min.js"></script>                    
        <link href= 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
        <noscript>
            <link rel="stylesheet" type="text/css" href="noscript_style.css">
        </noscript>
        
      </head>
<body>
  <div id="wrapper">
      <header>
          <img src="img/guitar_background.jpg" alt="guitar-background">
      </header>
    <nav class="topnav" id="myTopnav">
        <a href="index.html">Home</a>
        <a href="rodzaje.html">Rodzaje</a>
        <a href="przykładowe_akordy.html">Przykładowe chwyty</a>
        <div class="dropdown">
          <button class="dropbtn" onclick = "dropdown_content()">Mistrzowie gitary
           <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
              <a href="hendrix.html">Jimy Hendrix</a>
              <a href="sting.html">Sting</a>
              <a href="rankingi.xml">Rankingi</a>
              <a href="#" class="active">Galeria</a>
              <a href="wyszukiwarka.php">Wyszukiwarka</a>
              <a href="register.php">Zarejestruj się</a>
              <?php
                loginHide();
              ?>
          </div>
        </div>
        <a href="kontakt.html">Kontakt</a>
        <a href="#" class="icon" onclick="responsiveNav()">
        <i class="fa fa-bars"></i> 
        </a>
    </nav>
      
    <h1 class="header">Galeria Zdjęć</h1>

    <?php
      ifuserLogged();

      $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      if (strpos($fullUrl, "watermark=empty") == true)
      {
          echo '<div class="alert alert-danger">
                  <li>Wypełnij pole ze znakiem wodnym!</li>
                </div>';
      }
    ?>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Tytuł:</label><br/>
        <input type="text" name="title" placeholder="Image title..."><br/><br/>
        <label>Autor:</label><br/>
        <?php
          if (isset($_SESSION["username"]))
          {
              echo '<input type="text" name="author" value='.$_SESSION["username"].'><br/><br/>';
              echo '<input type="radio" name="status" value="prywatne">prywatne
                    <input type="radio" name="status" value="publiczne">publiczne<br/><br/><br/>';
          }
          else
              echo '<input type="text" name="author" placeholder="Image author..."><br/><br/>';  
        ?>
        <label>Znak Wodny:</label><br/>
        <input type="text" name="watermark" placeholder="Watermark text..."><br/><br/>
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
    </form>   

      <?php
        include 'upload_view.php';
      ?>

      <footer>
          Copyright 2019, Przemysław Rośleń<br>
          Kontakt: <a href="mailto:przemek.roslen@gmail.com">
             przemek.roslen@gmail.com</a>
       </footer>
  </div>
</body>
        
</html>
