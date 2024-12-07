<?php

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}

$user_role_id = $_SESSION['user_role_id'];
$title = 'Materiels';
$description = 'Description de la page qui ajoute un utilisateurs';

try {
    // Requête SQL optimisée pour inclure l'ID du statut du matériel
    $query = $dbh->query("
        SELECT 
            material.*,
            category.name_category,
            model.name_model,
            brand.name_brand,
            loan.date_loan,
            loan.date_return,
            material_status.id_material_status AS status_id
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
        LEFT JOIN 
            material_status ON material_status_update.id_material_status = material_status.id_material_status
        GROUP BY 
            material.id_material
        ORDER BY 
            material.id_material;
    ");

    $materials = $query->fetchAll();

    function isAvailableForRent($material) {
        $current_date = date('Y-m-d');

        // Vérifier si le statut du matériel est disponible (statut ID != 1 pour 'À réparer') et s'il n'est pas en location
        if ($material['status_id'] != 4 && (empty($material['date_return']) || $material['date_return'] < $current_date)) {
            return true;
        }
        return false;
    }
    
} catch (PDOException $e) {
    // En cas d'erreur, renvoyer un message d'erreur
    echo "Il y a une erreur : " . $e->getMessage();
    die;
}
