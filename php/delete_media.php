<?php

include 'config.php';

$del_media = $_POST["id_media"];
$req= "UPDATE media SET del_media=1 WHERE id_media=$del_media";
$result = mysqli_query($link, $req);
echo "Media was deleted";

?>
