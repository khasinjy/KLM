<!DOCTYPE HTML> 
<html>

   <head>
   <title>KLM : Mon compte</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/theme.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/monscript.js"></script>
   </head>

   <?php
    include '../header.php';
   ?>


<?php

	/****Vérification que l'utilisateur est déja crée****/

	include 'config.php';

	if( isset($_POST["check"]) ){ //verifie qu'on a cliqué sur le bouton de connexion
			
		$email= $_POST["email"];
		$mdp= $_POST["mdp"];
		$res= mysqli_query($link," SELECT login,id_user FROM `utilisateur` WHERE email='$email' && passwd='$mdp' && del!=1");
		$login_tableau=	mysqli_fetch_assoc($res);
		//si l'internaute a tape le bon mail et mdp -> connexion
		if( $login_tableau != NULL){ 
				$_SESSION["login"] = $login_tableau["login"];
				$_SESSION["id_user"] = $login_tableau["id_user"];
				echo "<script>alert('Ravi de vous revoir !');location.href='../index.php';</script>";
				
		}else{
			echo "<script>alert('Mot de passe ou email incorrect !');location.href='login.php?error';</script>";
		}
			
	}

	include '../footer.php';


?>