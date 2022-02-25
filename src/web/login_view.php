<?php
  require_once 'login.php';
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
              <a href="galeria.php">Galeria</a>
              <a href="wyszukiwarka.php">Wyszukiwarka</a>
              <a href="register.php">Zarejestruj się</a>
              <a href="#" class="active">Zaloguj</a>
          </div>
        </div>
        <a href="kontakt.html">Kontakt</a>
        <a href="#" class="icon" onclick="responsiveNav()">
        <i class="fa fa-bars"></i> 
        </a>
    </nav>
      
    <h1 class="header">Zaloguj się</h1>
    
    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "username=wrong") == true)
        {
            echo '<div class="alert alert-danger">
                    <li>Username does not exist!</li>
                  </div>';
        }
        else if ((strpos($fullUrl, "password=wrong") == true))
             {
                echo '<div class="alert alert-danger">
                        <li>Wrong Password!</li>
                      </div>';
             }
    ?>

    <form action="login.php" method="POST">

        <div class="container_register">

            <label for="username1">Login</label><br/>
            <input type="text" name="username1" placeholder="Wprowadź login"><br/><br/>

            <label for="password">Hasło</label><br/>
            <input type="password" name="password1" placeholder="Wprowadź hasło"><br/><br/>

            <button type="submit" name="submit" class="registerbtn">Zaloguj się</button>

        </div>
    </form>   

      <footer>
          Copyright 2019, Przemysław Rośleń<br>
          Kontakt: <a href="mailto:przemek.roslen@gmail.com">
             przemek.roslen@gmail.com</a>
       </footer>
  </div>
</body>
        
</html>
