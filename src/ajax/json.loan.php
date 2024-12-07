<?php
try {
    $query = "
    SELECT 
        material.*,
        category.name_category,
        model.name_model,
        brand.name_brand,
        loan.date_loan,
        loan.date_return,
        users.firstname,
        users.lastname,
        'En location' as availability_status
    FROM 
        material
    LEFT JOIN 
        category ON material.id_category = category.id_category 
    LEFT JOIN 
        model ON material.id_model = model.id_model 
    LEFT JOIN 
        brand ON model.id_brand = brand.id_brand
    INNER JOIN 
        material_loan_reason ON material.id_material = material_loan_reason.id_material
    INNER JOIN 
        loan ON material_loan_reason.id_loan = loan.id_loan
    INNER JOIN 
        users ON loan.id_users = users.id_users
    WHERE 
        loan.date_return > NOW()
        AND loan.id_loan_status = 2
    GROUP BY 
        material.id_material
    ORDER BY 
        loan.date_loan DESC;
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

