<?php

$title = 'Utilisateurs';
$description = 'Description de la page des utilisateurs';

require '../src/data/db-connect.php';

$nbParPage = 10;
$search = isset($_GET['search']) ? strtolower($_GET['search']) : '';

// Calcul du nombre total de pages
if (!empty($search)) {
    $query = $dbh->query("SELECT COUNT(*) AS nbusers FROM users WHERE lastname LIKE '%$search%'");
} else {
    $query = $dbh->query("SELECT COUNT(*) AS nbusers FROM users");
}
$nbUsers = $query->fetch()['nbusers'];
$nbPages = ceil($nbUsers / $nbParPage);

// Récupération de la page courante
$currentPage = isset($_GET['pagination']) ? intval($_GET['pagination']) : 1;
$currentPage = max(1, min($currentPage, $nbPages)); // Assure que la page courante est dans les limites




// Calcul de l'offset de la requête SQL
$start = ($currentPage - 1) * $nbParPage;

// Récupération des utilisateurs pour la page courante
if (!empty($search)) {
    $query = $dbh->query("SELECT * FROM users WHERE lastname LIKE '%$search%' ORDER BY lastname ASC LIMIT $start, $nbParPage");
} else {
    $query = $dbh->query("SELECT * FROM users ORDER BY lastname ASC LIMIT $start, $nbParPage");
}

$users = $query->fetchAll();
