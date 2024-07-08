<?php

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}
$user_role_id = $_SESSION['user_role_id'];

if (!empty($_GET['id'])) {
   

    $query = $dbh->prepare("DELETE FROM material WHERE id_material = :id");
    $query->execute([
        'id' => $_GET['id'],
    ]);

    header('Location: /?page=ensemble-materiel');
}

