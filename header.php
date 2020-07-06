<?php 
   session_start();
?>
<!--MENU-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a href="\KLM/index.php"> <img src="\KLM/images/logo_blanc.png" alt="logo KLM" id="logo"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="navbar-nav">
            <a class="nav-item nav-link" href="\KLM/php/AffichageFilms.php" id="lienFilms">Films</a>
            <a class="nav-item nav-link" href="\KLM/php/AffichageSeries.php">Séries</a>
            <?php
            if(isset($_SESSION["login"]) && $_SESSION["login"]!=null)
            {
               echo "<a class='nav-item nav-link' href='\KLM/php/favoris_check.php'>Ma liste </a>";
            }
            ?>
            <form action="\KLM/php/searchbar.php" method="POST" class="form-inline">
               <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
         <?php 
               if(isset($_SESSION["login"]) && $_SESSION["id_user"]==1){
                  echo "<a class='nav-item nav-link' href='\KLM/php/addMedia.php'>Ajouter média</a>";
                  echo "<a class='nav-item nav-link' href='\KLM/php/editMedia.php'>Modifier/Supprimer média</a>";
               }
                if(isset($_SESSION["login"]) && $_SESSION["login"]!=null)
                {
                  echo "<a class='nav-item nav-link' href='\KLM/php/myaccount.php'>Mon compte </a>";
                	echo "<div><a class='nav-item1 nav-link' href='\KLM/php/logout.php'> Deconnexion </a></div>";
            	}else{
            		echo "<div><a class='nav-item nav-link' href='\KLM/php/login.php'>Se connecter</a></div>";
               }

			?>
         </div>
      </div>

   </nav>