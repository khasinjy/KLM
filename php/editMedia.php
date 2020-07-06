<!DOCTYPE html>
<html lang="fr">
<head>
   <title>KLM</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/theme.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/monscript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
   </head>
<body>

 <?php
    include '../header.php';
    include 'config.php';
    
    $req = "SELECT media.id_media,media.image,media.titre,media.genre,media.resume,media.datedesortie,ROUND(AVG(note.note),2) 
	as moy_note FROM media LEFT JOIN note ON note.note_media=media.id_media WHERE del_media!=1 GROUP BY id_media ORDER BY titre"; 
    $res = mysqli_query($link, $req);
        
    echo "<table>";
    echo "<th></th><th></th><th>Titre</th><th>Genre</th><th>Résumé</th><th>Date de sortie</th><th>Supprimer</th>";

    while($ligne=mysqli_fetch_assoc($res)){
        echo "<tr>";
        $compteur = false; //var pour gerer l'affichage unique par media de l'icone favoris
        foreach($ligne as $indice=>$valeur){
            echo "<td>";
            if($indice == "id_media"){ //on n'affiche pas l'id media
                $id_media= $valeur;
                if($compteur == false && isset($_SESSION["login"])){
                    echo "<input type='image' src='../images/like.png' class='fav' data-id_media='".$id_media."' name='add_fav' title='Ajouter à ma liste' alt='Ajouter à ma liste'>";    
                }
                $compteur = true;
            }
            else if($indice == "image"){
                echo "<img class='photo' src='../images/$valeur'>";
            }
            else if($indice == "moy_note" && isset($_SESSION["login"])){   
                //echo "<button name='edi_media' data-id_media='".$id_media."'><i class='fas fa-edit' name='media_delete' title='Modifier'></button>";  
                echo "<button name='del_media' data-id_media='".$id_media."'><i class='fas fa-minus' name='media_delete' title='Supprimer'></button>";
                
            }
            else{
                echo $valeur;  
            }
            echo "</td>";
        } 
        echo "</tr>";
	}	
        echo "</table>";

    include '../footer.php';
    ?>    
</body>
</html>