<?php

$ajax = !empty($_GET['ajax']) ? $_GET['ajax'] : '';

$path = "../src/ajax/$ajax.php";
if (file_exists($path)) {
  require "../src/data/db-connect.php";
  require $path;
} else {
  echo '{"message":"Aucun fichier json n\'est appelé."}';
  exit;
}
