function responsiveNav() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
      function dropdown_content()
       {
        var x = document.getElementsByClassName("dropdown-content")[0];
        if (x.style.display == "none")
        {
          x.style.display = "block";
        }
        else
        {
          x.style.display = "none";
        }
      }

      var session_i;
      function Rodzaje(i)
       {
        var a = document.getElementsByClassName('content_rodzaje');

        var j;
        for (j = 0; j < 5; j++)
        {
            a[j].style.display = 'none';
        }

         document.getElementsByClassName('content_rodzaje')[i].style.display = 'block';
         sessionStorage.session_i = i;
        }

        function sesja() {
            if (sessionStorage.session_i >= 0)
            {
                 Rodzaje(sessionStorage.session_i);
            }
            
        }


        function movingChords()
        {
          var top = 0;      
          var elem = document.getElementById("chords"); 
          var id = setInterval(Move, 20);
          var direction = 'd';

          function Move()
          {   
            if (direction == 'u')
            {
              if (top != 0)
              {
                top--; 
                elem.style.top = top + "px"; 
              }
              else
              {
                direction = 'd';
              }
            }     
            else 
            {
              if (top <= 300)
              {
                top++; 
                elem.style.top = top + "px"; 
              }
              else
              {
                direction = 'u';
              }
            }         
          }
        }
        
        function count_visits() {
          var visits = 0;
          if (localStorage.visits) {
              localStorage.visits = Number(localStorage.visits) + 1;
          } else {
              localStorage.visits = 1;
          }
          var div = document.getElementById("result_header");
          div.innerHTML = "Liczba wejść: " +
              localStorage.visits;
      }

        
        function zapisz() {

          document.getElementById("output").innerHTML = '';
          var imie = document.getElementById("imie").value;
          var nazwisko = document.getElementById("nazwisko").value;
          var email = document.getElementById("email").value;
          var telefon = document.getElementById("telefon").value;
          var komentarz = document.getElementById("komentarz").value;
          var data = document.getElementById("datepicker").value;
          var output = document.getElementById("output");

          localStorage.setItem("imie", imie);
          localStorage.setItem("nazwisko", nazwisko);
          localStorage.setItem("email", email);
          localStorage.setItem("telefon", telefon);
          localStorage.setItem("komentarz", komentarz);
          localStorage.setItem("datepicker", data);

        }

        function wyswietl() {

          if (document.getElementById("output").innerHTML == '')
          {
            output.innerHTML += "Imię: "+localStorage.getItem('imie')+'<br>';
            output.innerHTML += "Nazwisko: "+localStorage.getItem('nazwisko')+'<br>';
            output.innerHTML += "E-mail: "+localStorage.getItem('email')+'<br>';
            output.innerHTML += "Telefon: "+localStorage.getItem('telefon')+'<br>';
            output.innerHTML += "Komentarz: "+localStorage.getItem('komentarz')+'<br>';
            output.innerHTML += "Data: "+localStorage.getItem('datepicker');
            document.getElementById("show_button").value = "Schowaj ostatni wpis";
          }
          else
          {
            document.getElementById("output").innerHTML = '';
            document.getElementById("show_button").value = "Wyświetl ostatni wpis";
          }
            
                          
        }

         function addLinks() {

          var headline3 = document.createElement("H3");
          headline3.innerHTML = "Mój osobisty ranking najlepszych gitarzystów";
          document.getElementById("append").appendChild(headline3);
          headline3.setAttribute("id", "table_header");

          var lastlink = document.createElement("A");
          lastlink.innerHTML = "5 najlepszych gitarzystów grających rocka według eskarock";
          document.getElementById("other_rankings").appendChild(lastlink);
          lastlink.setAttribute("href", "http://www.eskarock.pl/er_eska_rock_news/polscy_rockowi_gitarzysci_subiektywne_zestawienie_5_najlepszych_gitarzystow_grajacych_rocka_zobacz_i_posluchaj_jak_graja_video/106031");
          lastlink.setAttribute("class", "rank_link");
          lastlink.setAttribute("target", "blank");
          }

          function fadeIn() {
            $(document).ready(function(){
              $("#wrapper2").fadeIn(300);
            });
          }
          
          function calendar() { 
          
            $(function() { 
                $( "#datepicker" ).datepicker(); 
            }); 
        }        
        function radio() {
          $( "input[type='radio']" ).checkboxradio();
        }
        
        function passwordsIdentity()
        {
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
        }

function search_by_title()
{
    const searchInput = document.querySelector("input");
    const title = [...document.getElementsByClassName("opis")];
    const thumbnail = [...document.getElementsByClassName("gallery")];
     
    const searchTitle = text => {
        const currentWord = text.target.value;
        let result = title;
        result = result.filter(title => title.textContent.includes(currentWord));
        for(var i = 0; i < thumbnail.length; i++)
        {
            thumbnail[i].style.display = "none";
        }    
    console.log(result[0]);
    
    for(var i = 0; i < thumbnail.length; i++)
        {
            for(var j = 0; j < thumbnail.length; j++)
            {
                if(result[i] === title[j])
                {
                    thumbnail[j].style.display = "block";
                }
            }  
        }  
    
    }
    
    searchInput.addEventListener('input', searchTitle);
}

         

        
        
        