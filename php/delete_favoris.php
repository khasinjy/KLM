 <?php
    session_start();
    if( isset($_POST["id_media"])){

        $id_media = $_POST["id_media"];
        include 'config.php';

        $req = "DELETE FROM favoris WHERE Fav_user= (".$_SESSION["id_user"].") AND Fav_media= (SELECT id_media FROM media WHERE id_media='".$id_media."')";
        $info = "Ce média n'apparaît plus dans votre liste.";

        if(mysqli_query($link, $req)){
            echo $info;
        }else{
            echo "Nous n'avons pas pu modifier votre liste.";
        }
            
    }


    ?>    
