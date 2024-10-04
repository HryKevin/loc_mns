<?php
try {
    // Préparez la requête SQL pour récupérer les matériels disponibles
    $query = "
    SELECT 
        material.id_material,
        material.name_material,
        material.description,
        material.serial_number,
        material.screen_size,
        material.processor,
        material.storage_memory,
        material.ram,
        material.image,
        category.name_category,
        model.name_model,
        brand.name_brand
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
    LEFT JOIN 
        material_status_update ON material.id_material = material_status_update.id_material
    WHERE 
        (loan.id_loan IS NULL  -- Aucun prêt associé, matériel jamais prêté
        OR (loan.date_return IS NOT NULL AND loan.date_return < NOW())  -- Matériel prêté mais retourné
        OR (loan.date_return = '0000-00-00' AND loan.date_loan < NOW()))  -- Date de retour non définie, mais prêt en cours
        AND (material_status_update.id_material_status != 4  -- Exclure les matériels en réparation
        OR material_status_update.id_material_status IS NULL)  -- Si aucun statut n'est associé, considérer comme non en réparation
    GROUP BY 
        material.id_material
    ORDER BY 
        material.id_material;
    ";

    // Prépare et exécute la requête
    $result = $dbh->prepare($query);
    $result->execute();

    
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    // Encoder les données en JSON et les renvoyer
    echo json_encode($data);
} catch (PDOException $e) {
    // En cas d'erreur, renvoyer un message d'erreur
    echo "Il y a une erreur: " . $e->getMessage();
    die;
}
