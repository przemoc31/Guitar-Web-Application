<?php
    include_once 'addUser.php';
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
              <a href="#" class="active">Zarejestruj się</a>
              <a href="login_view.php">Zaloguj</a>
          </div>
        </div>
        <a href="kontakt.html">Kontakt</a>
        <a href="#" class="icon" onclick="responsiveNav()">
        <i class="fa fa-bars"></i> 
        </a>
    </nav>
      
    <h1 class="header">Zarejestruj się</h1>

    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "register=invalid") == true)
        {
            echo '<div class="alert alert-danger">
                    <li>ERROR!</li>
                  </div>';
        }
    ?>

    <form action="addUser.php" method="POST">

        <div class="container_register">

            <label for="email">e-mail</label><br/>
            <input type="text" name="email" placeholder="Wprowadź e-mail" required><br/><br/>

            <label for="username">Login</label><br/>
            <input type="text" name="username" placeholder="Wprowadź login" required><br/><br/>

            <label for="password">Hasło</label><br/>
            <input type="password" name="password" placeholder="Wprowadź hasło" id="password" required><br/><br/>

            <label for="confirm">Potwierdź hasło</label><br/>
            <input type="password" name="confirm" placeholder="Potwierdź hasło" id="confirm" required><br/><br/>

            <button type="submit" name="register" class="registerbtn">Zarejestruj się</button><br/><br/>
        </div>
    </form>   

    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                    }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;    
    </script>
      <footer>
          Copyright 2019, Przemysław Rośleń<br>
          Kontakt: <a href="mailto:przemek.roslen@gmail.com">
             przemek.roslen@gmail.com</a>
       </footer>
  </div>
</body>
        
</html>
