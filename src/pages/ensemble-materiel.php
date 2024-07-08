<?php


if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}

$user_role_id = $_SESSION['user_role_id'];

$title = 'Materiels';
$description = 'Description de la page qui ajoute un utilisateurs';
$user_role_id = $_SESSION['user_role_id'];

$query= $dbh->query("SELECT * FROM material LEFT JOIN category ON category.id_category= material.id_category LEFT JOIN model ON model.id_model= category.id_category LEFT JOIN brand ON brand.id_brand= category.id_category");
$materials=$query->fetchAll();

