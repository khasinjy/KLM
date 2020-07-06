<!DOCTYPE HTML> 
<html>

   <head>
   <title>KLM : Inscription</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/theme.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/monscript.js"></script>
      <!-- Font Icon -->
   <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="/colorlib-regform-10/css/style.css">
   </head>

   <?php
    include '../header.php';
    
    echo "<div style='background-image:url(https://c.wallhere.com/photos/30/72/1920x1080_px_Breaking_Bad_Walter_White-995093.jpg!d); background-repeat : no-repeat;  background-size:cover ;'>
    <div class='main'>
      <h1></h1>
      <div class='container'>
         <div class='sign-up-content'>
            <form method='POST' action=''>
            <div class='form-textbox'>
                     <label for='pass'>Login</label>
                     <input type='login' name='login' id='login' />
                  </div>
                  <div class='form-textbox'>
                     <label for='email'>Email</label>
                     <input type='email' name='email' id='email'/>
                  </div>

                  <div class='form-textbox'>
                     <label for='pass'>Password</label>
                     <input type='password' name='mdp' id='pass'/>
                  </div>


                  <div class='form-textbox'>
                     <input type='submit' name='inscription_check' id='submit' class='submit' value='Connexion'/>
                  </div>
            </form>

            <p class='loginhere'>
                  Vous avez un compte ? <a href='login.php' class='loginhere-link'>Connectez-vous</a>
            </p>
         </div>
         </div>
      </div>";
      ?>

    <?php
        //traitement du formulire d'inscription
        include 'config.php';

        if( isset($_POST["inscription_check"]) ){ //verifie qu'on a cliqué sur le bouton d'inscription

            $login = $_POST["login"];
            $email= $_POST["email"];
            $mdp= $_POST["mdp"];
            $req = "INSERT INTO utilisateur (login,email,passwd) VALUES ('$login', '$email','$mdp')";
            if( mysqli_query($link, $req) ){
                echo "<script>alert('Vous avez bien créé votre compte !');location.href='../index.php';</script>";
            }
            else {
                echo $req;
                echo "<p id='inscription_echec'>Nous n'avons pas pu créé votre compte. </p>";
                if (fnmatch("Duplicate entry*for key 'email'",mysqli_error($link))){
                    echo "<br/><p>Cette adresse mail est déjà attribuée.</p>";
                }
            }

        }
    
    include '../footer.php';

?>