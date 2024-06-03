<?php
try {
    // Préparez et exécutez la requête SQL
    $query = "SELECT * FROM material 
              LEFT JOIN category ON category.id_category = material.id_category 
              LEFT JOIN model ON model.id_model = category.id_category 
              LEFT JOIN brand ON brand.id_brand = category.id_category
              LEFT JOIN material_loan_reason  ON material_loan_reason.id_material = material.id_material
              LEFT JOIN loan ON loan.id_loan= material_loan_reason.id_loan
              WHERE id_loan_status = 3
              "
              ;
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
