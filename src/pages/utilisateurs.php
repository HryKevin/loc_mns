<?php

$title = 'Utilisateurs';
$description = 'Description de la page des utilisateurs';

require '../src/data/db-connect.php';

# Récupération de tous les utilisateur
$query = $dbh->query("SELECT * FROM users");
$users = $query->fetchAll();


// Nombre d'utilisateurs par page
$usersPerPage = 10;

// Calcul du nombre total de pages
$totalPages = ceil(count($users) / $usersPerPage);

// Détermination de la page actuelle
$currentPage = isset($_GET['page']) ? max(1, min($totalPages, intval($_GET['page']))) : 1;

// Index de début et de fin des utilisateurs à afficher pour la page actuelle
$startIndex = ($currentPage - 1) * $usersPerPage;
$endIndex = min($startIndex + $usersPerPage - 1, count($users) - 1);

// Utilisateurs à afficher pour la page actuelle
$usersToShow = array_slice($users, $startIndex, $endIndex - $startIndex + 1);