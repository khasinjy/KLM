 <?php
    session_start();
    if( isset($_POST["id_media"])){

        $id_media = $_POST["id_media"];
        include 'config.php';
         //verification si l'user a deja mis dans sa liste de favoris
        $req1 = "SELECT * FROM favoris JOIN media ON favoris.Fav_media= media.id_media JOIN utilisateur ON utilisateur.id_user=favoris.Fav_user WHERE id_user=".$_SESSION["id_user"]. " AND media.id_media='".$id_media."'"; 
        $res = mysqli_query($link, $req1);
        $fav_media = mysqli_fetch_row($res); 

        //un user ne peut ajouter qu'une fois un media a ses fav 
        if( $fav_media == NULL){ //si le media n'etait pas un des ses fav
            $req2 = "INSERT INTO `favoris` ( `Fav_user`, `Fav_media`) VALUES ( ".$_SESSION["id_user"].", (SELECT media.id_media FROM media WHERE media.id_media = '".$id_media."'))";
            mysqli_query($link, $req2);
            $info = "Ce média a bien été ajouté à votre liste.";
        }else{
            $info = "Ce média est déjà dans votre liste.";
        }
        
        echo $info;
            
    }



    ?>    
