<?php

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}

if (!empty($_GET['id'])) {
    require '../src/data/db-connect.php';

    $query = $dbh->prepare("DELETE FROM material WHERE id_material = :id");
    $query->execute([
        'id' => $_GET['id'],
    ]);

    header('Location: /?page=ensemble-materiel');
}

