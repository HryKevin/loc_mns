<?php

if (empty($_SESSION['user_id'])) {
  header('Location: /?page=connexion');
  exit;
}

$title = "Materiels";
$description = "Déscription de la page materiels";
