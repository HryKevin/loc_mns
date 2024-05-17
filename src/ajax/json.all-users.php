<?php
try {
    // Préparez et exécutez la requête SQL
    $query = "SELECT * FROM  users
    LEFT JOIN role ON users.id_role = role.id_role WHERE role.id_role = 1";
    $result = $dbh->prepare($query);
    $result->execute();

    // Récupérez les résultats de la requête
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    // Encoder les données en JSON et les renvoyer
    echo (json_encode($data));
} catch (PDOException $e) {
    // En cas d'erreur, renvoyer un message d'erreur
    echo "il y a une erreur" . $e->getmessage();
    die;
}
