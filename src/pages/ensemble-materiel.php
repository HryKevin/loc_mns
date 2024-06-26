<?php


if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}
$title = 'Materiels';
$description = 'Description de la page qui ajoute un utilisateurs';

$query= $dbh->query("SELECT * FROM material LEFT JOIN category ON category.id_category= material.id_category LEFT JOIN model ON model.id_model= category.id_category LEFT JOIN brand ON brand.id_brand= category.id_category");
$materials=$query->fetchAll();

