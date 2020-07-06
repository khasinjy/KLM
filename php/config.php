<?php

$databaseHost = 'localhost';
$databaseName = 'siteinternet';
$databaseUsername = 'root';
$databasePassword = 'unEM59nMjwjGbPBS';

$link=mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die(mysqli_error($link)); 
$link->set_charset("utf8");
 
?>