<?php
    session_start();
    if( isset($_POST["note_donnee"])){

        $note_donnee = $_POST["note_donnee"];
        $id_media = $_POST["id_media"];
        include 'config.php';
        //verification si l'user a deja mis une note pour ce media
        $req1 = "SELECT * FROM media JOIN note ON note.note_media=media.id_media JOIN utilisateur ON utilisateur.id_user=note.note_user WHERE id_user=".$_SESSION["id_user"]." AND media.id_media = ".$id_media.""; 
        //echo $req1;
        $res = mysqli_query($link, $req1);
        $note_donnee_media=	mysqli_fetch_row($res); 

        //un user ne peut donner qu'une note par média
        if( $note_donnee_media == NULL){ //si il n'a jamais donné de note pour ce titre
            $req2 = "INSERT INTO `note` ( `note_user`, `note_media`, `note`) VALUES ( ".$_SESSION["id_user"].", (SELECT media.id_media FROM media WHERE media.id_media = ".$id_media."),'". $note_donnee."')";
            $info = "Merci pour votre vote.";
        }else{
			$req2 = "UPDATE note SET note='".$note_donnee."' WHERE note_user= (".$_SESSION["id_user"].") AND note_media= (SELECT id_media FROM media WHERE media.id_media =".$id_media.")";
            $info = "Vous avez changé votre note pour ce média.";
        }

        if(mysqli_query($link, $req2)){
            echo $info;
        }else{
           echo "Nous n'avons pas pu enregistrer votre note.";
        }
            
    }



    ?>    
