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
         <!-- Font Icon -->
   <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="/colorlib-regform-10/css/style.css">
   </head>
<body>

<?php
    include '../header.php';
    include 'config.php';
?>
  <div style='background-image:url(https://c.wallhere.com/photos/30/72/1920x1080_px_Breaking_Bad_Walter_White-995093.jpg!d); background-repeat : no-repeat;  background-size:cover ;'>

<div class="main">
   <h1></h1>
   <div class="container">
      <div class="sign-up-content">
         <form method="POST" action='' enctype="multipart/form-data">
            <div class="form-textbox">
               <label for="title">Titre</label>
               <input type="text" name="titre" id="titre" />
            </div>

            <div class="form-textbox">
               <label for="resume">Résumé</label>
               <input type="resume" name="resume" id="resume" />
            </div>

            <div class="form-textbox">
               <label for="genre">Genre</label>
               <input type="genre" name="genre" id="genre" />
            </div>
            <div class="form-textbox">
               <label for="date">Date de sortie</label>
               <input type="date" name="date" />
            </div>
            <div class="form-textbox">
               <label for="type">Catégorie</label>
               <select name="type" multiple>
                  <option value="1">Film</option>
                  <option value="0">Serie</option>
               </select>
            </div>
            <div class="form-textbox">
               <label for="type">Image</label>
               <input type="file" name="file">
            </div>

            <div class="form-textbox">
               <input type="submit" name="check" id="submit" class="submit" value="Ajouter" />
            </div>
         </form>
      </div>
   </div>
</div>
<?php
   echo $title=$_POST["titre"];
   echo $resume=$_POST["resume"];
   echo $type=$_POST["type"];
   echo $genre=$_POST["genre"];
   echo $date=$_POST["date"];

   $nom=$_FILES["file"]["name"];

   if(move_uploaded_file($_FILES["file"]["tmp_name"],"php/".$nom)){
      echo "fichier fonctionne";
   }else{
      echo "fichier pas upload";
   }

    $req="INSERT INTO `media`(`titre`,`resume`,`genre`,`type`) VALUES('".$title."','".$resume."','".$genre." <p class=date>".$date."</p>','".$type."')";
    echo $req;
    if( mysqli_query($mysqli, $req) ){
      echo "<script>alert('Vous avez bien ajouté un média !');</script>";
   }
   else {
      echo "<p id='inscription_echec'>Nous n'avons pas pu ajouté de média. </p>";
   }

   include '../footer.php';
?>    
</body>
</html>