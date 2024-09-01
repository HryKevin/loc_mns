<?php
try {
    // Préparez la requête SQL pour récupérer tous les matériels et déterminer la disponibilité
    $query = "
    SELECT 
        material.*,
        category.name_category,
        model.name_model,
        brand.name_brand,
        CASE 
            WHEN loan.id_loan IS NULL OR (loan.date_return IS NOT NULL AND loan.date_return < NOW())
            THEN 'Disponible'
            ELSE 'Non disponible'
        END as availability_status
    FROM 
        material
    LEFT JOIN 
        category ON material.id_category = category.id_category 
    LEFT JOIN 
        model ON material.id_model = model.id_model 
    LEFT JOIN 
        brand ON model.id_brand = brand.id_brand
    LEFT JOIN 
        material_loan_reason ON material.id_material = material_loan_reason.id_material
    LEFT JOIN 
        loan ON material_loan_reason.id_loan = loan.id_loan
    ORDER BY 
        material.id_material;
    ";

    // Préparez et exécutez la requête
    $result = $dbh->prepare($query);
    $result->execute();

    // Récupérez les résultats de la requête
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    // Encoder les données en JSON et les renvoyer
    echo json_encode($data);
} catch (PDOException $e) {
    // En cas d'erreur, renvoyer un message d'erreur
    echo "Il y a une erreur : " . $e->getMessage();
    die;
}
?>
