<!DOCTYPE html>
<html lang="fr">
<head>
   <title>KLM</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/theme.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/monscript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
   </head>
<body>

 <?php
    include '../header.php';
    include 'config.php';
    $req = "SELECT media.id_media,ROUND(AVG(note.note),1) as moy_note,media.image,media.titre,media.genre,media.resume FROM media LEFT JOIN note ON note.note_media=media.id_media WHERE type!=1 && del_media!=1 GROUP BY id_media ORDER BY titre"; 
    $res = mysqli_query($link, $req);
        
    echo "<table>";
    /*************pour note perso ************/
    if(isset($_SESSION["login"])){
        //on stocke dans un tableau les notes que l'user connecte a mis à certains medias
            $mediaEtNote[0]= [""];
            $req1 = "SELECT note_user,note_media,note.note FROM media JOIN note ON note.note_media=media.id_media WHERE note_user=".$_SESSION["id_user"]." ORDER BY titre";
            $res1 = mysqli_query($link, $req1);
    
            while($ligne=mysqli_fetch_assoc($res1)){
                foreach($ligne as $indice=>$valeur){
                    if($indice == "note_media"){
                            $media = $valeur;
                    }else if($indice == "note"){
                        $mediaEtNote["$media"]  = $valeur; //l'index est l'id_media et la valeur est la note donné par l'user
                    }
                }
            }
    /**************************/
            //gere l'affichage de la ligne des titres des colonnes si user connecté
            echo "<tr><th class='id_media'></th><th class='note'>Note</th>";
        }
        else{
            echo "<tr><th class='id_media'>";
        }
        
        echo "<th class='moy_note'>Note moyenne</th><th class='image'></th><th class='titre'>Titre</th><th class='genre'>Genre<br>Date de sortie</th><th class='resume'>Résumé</th></tr>";

    while($ligne=mysqli_fetch_assoc($res)){
        echo "<tr>";
        $compteur_fav = false; //var pour gerer l'affichage unique par media de l'icone favoris
        $compteur_note = false; //var pour gerer l'affichage unique par media de les icones pour noter
        foreach($ligne as $indice=>$valeur){
            echo "<td class='".$indice."'>";
            if($indice == "id_media"){ //on n'affiche pas l'id media
                $id_media= $valeur;
                if($compteur_fav == false && isset($_SESSION["login"])){
                    echo "<input type='image' src='../images/like.png' class='fav' data-id_media='".$id_media."' name='add_fav' title='Ajouter à ma liste' alt='Ajouter à ma liste'>";    
                }
                $compteur_fav = true;
            }
            else if($indice == "image"){
                echo "<img class='photo' src='../images/$valeur'>";
            }
            else if($indice == "moy_note"){
                if($valeur ==""){
                    echo "Pas de note moyenne";    
                }
                else{
                    echo "$valeur/5"; 
                }           
            }
            else{
                echo $valeur;  
            }
            echo "</td>";
            /*************pour note perso***********/
            if($compteur_note == false && isset($_SESSION["login"])){
                echo "<td>";
                echo "<span id='attr_note'>
                    <input type='image' src='../images/star.png' class='noter' data-id_media='".$id_media."' name='noter' value='1' alt='1/5' title='Nul'>
                    <input type='image' src='../images/star.png' class='noter' data-id_media='".$id_media."' name='noter' value='2' alt='2/5' title='Pas terrible'>
                    <input type='image' src='../images/star.png' class='noter' data-id_media='".$id_media."' name='noter' value='3' alt='3/5' title='Moyen'>
                    <input type='image' src='../images/star.png' class='noter' data-id_media='".$id_media."' name='noter' value='4' alt='4/5' title='Super'>
                    <input type='image' src='../images/star.png' class='noter' data-id_media='".$id_media."' name='noter' value='5' alt='5/5' title='Incroyable'>
                    <br/></span>";    
                if(array_key_exists ( $id_media , $mediaEtNote )){
                    echo $mediaEtNote[$id_media]."/5";
                }
                else{
                    echo "Pas de note";
                }
                echo "</td>";
                $compteur_note = true;
            }
            /***************/
        } 
        echo "</tr>";
    }
        echo "</table>";

    include '../footer.php';
    ?>    
</body>
</html>