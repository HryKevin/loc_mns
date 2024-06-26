<?php
try {
    // Préparez et exécutez la requête SQL
    $query = "SELECT * FROM material 
              LEFT JOIN category ON category.id_category = material.id_category 
              LEFT JOIN model ON model.id_model = category.id_category 
              LEFT JOIN brand ON brand.id_brand = category.id_category";
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
