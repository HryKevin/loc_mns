<?php
$title = "Catégories";
$description = "Description de la page catégories";

require '../src/data/db-connect.php';

// Requête pour récupérer les catégories
$query = "SELECT id_brand, name_brand, image FROM brand";
$brand = $dbh->query($query);
$brands = $brand->fetchAll();

if (isset($_SESSION['user_id'])) {
    // Requête pour récupérer le rôle de l'utilisateur connecté
    $query = "SELECT role.id_role, role.name_role
            FROM users
            JOIN role ON users.id_role = role.id_role
            WHERE users.id_users = :user_id";
    $userQuery = $dbh->prepare($query);
    $userQuery->bindParam(':user_id', $_SESSION['user_id']);
    $userQuery->execute();

    $user = $userQuery->fetch();

    if ($user) {
        $userRole = $user['name_role'];
    }
}