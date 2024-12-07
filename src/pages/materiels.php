<?php

if (empty($_SESSION['user_id'])) {
  header('Location: /?page=connexion');
  exit;
}
$user_role_id = $_SESSION['user_role_id'];

$title = "Materiels";
$description = "Déscription de la page materiels";
