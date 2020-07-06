<!DOCTYPE html>
<html>

<head>
   <title>KLM : Mon compte</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="/css/theme.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <!-- Font Icon -->
   <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">

   <!-- Main css -->
   <link rel="stylesheet" href="/colorlib-regform-10/css/style.css">

</head>

<body>
   <?php
   include '../header.php';
   ?>


   <div style="  background-image:url(https://c.wallhere.com/photos/30/72/1920x1080_px_Breaking_Bad_Walter_White-995093.jpg!d); background-repeat : no-repeat;  background-size:cover ;">

      <div class="main">
         <h1></h1>
         <div class="container">
            <div class="sign-up-content">
               <form method="POST" action='forgot_my_passwd.php'>
                  <div class="form-textbox">
                     <label for="email">Email</label>
                     <input type="email" name="email" id="email" />
                  </div>

                  <div class="form-textbox">
                     <input type="submit" name="check" id="submit" class="submit" value="Envoyer par mail" />
                  </div>
               </form>
            </div>
         </div>
      </div>

</body>

<?php

include '../footer.php';

?>

</html>