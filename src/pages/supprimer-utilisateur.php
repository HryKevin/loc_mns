<?php

if (!empty($_GET['id'])) {
    require '../src/data/db-connect.php';

    $query = $dbh->prepare("DELETE FROM users WHERE id_users = :id");
    $query->execute([
        'id' => $_GET['id'],
    ]);

    header('Location: /?page=utilisateurs');
}
