<?php

require '../src/data/db-connect.php';

$idBrand = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nbParPage = 10;
$search = isset($_GET['search']) ? strtolower($_GET['search']) : '';

// Récupérer le nom de la marque pour le titre de la page
$query = $dbh->prepare("SELECT name_brand FROM brand WHERE id_brand = :id");
$query->execute(['id' => $idBrand]);
$brand = $query->fetch();
$title = $brand ? $brand['name_brand'] : 'Marque inconnue';
$description = 'Description de la page des matériels triés par marques';

// Calcul du nombre total de pages pour les matériels dans la marque
if (!empty($search)) {
    $query = $dbh->prepare("SELECT COUNT(*) AS nbmaterials FROM material 
                            LEFT JOIN model ON model.id_model = material.Id_Model 
                            LEFT JOIN brand ON brand.id_brand = model.id_brand 
                            WHERE brand.id_brand = :id AND material.name_material LIKE :search");
    $query->execute([
        'id' => $idBrand,
        'search' => "%$search%"
    ]);
} else {
    $query = $dbh->prepare("SELECT COUNT(*) AS nbmaterials FROM material 
                            LEFT JOIN model ON model.id_model = material.Id_Model 
                            LEFT JOIN brand ON brand.id_brand = model.id_brand 
                            WHERE brand.id_brand = :id");
    $query->execute(['id' => $idBrand]);
}
$nbMaterials = $query->fetch()['nbmaterials'];
$nbPages = ceil($nbMaterials / $nbParPage);

// Récupération de la page courante
$currentPage = isset($_GET['pagination']) ? intval($_GET['pagination']) : 1;
$currentPage = max(1, min($currentPage, $nbPages)); // Assure que la page courante est dans les limites

// Calcul de l'offset de la requête SQL
$start = ($currentPage - 1) * $nbParPage;

// Récupération des matériels pour la page courante
if (!empty($search)) {
    $query = $dbh->prepare("SELECT material.*, category.name_category, model.name_model, brand.name_brand FROM material 
                            LEFT JOIN category ON category.id_category = material.id_category 
                            LEFT JOIN model ON model.id_model = material.Id_Model 
                            LEFT JOIN brand ON brand.id_brand = model.id_brand 
                            WHERE brand.id_brand = :id AND material.name_material LIKE :search 
                            ORDER BY material.name_material ASC LIMIT :start, :nbParPage");
    $query->bindParam(':id', $idBrand, PDO::PARAM_INT);
    $query->bindParam(':search', $search, PDO::PARAM_STR);
    $query->bindParam(':start', $start, PDO::PARAM_INT);
    $query->bindParam(':nbParPage', $nbParPage, PDO::PARAM_INT);
    $query->execute();
} else {
    $query = $dbh->prepare("SELECT material.*, category.name_category, model.name_model, brand.name_brand FROM material 
                            LEFT JOIN category ON category.id_category = material.id_category 
                            LEFT JOIN model ON model.id_model = material.Id_Model 
                            LEFT JOIN brand ON brand.id_brand = model.id_brand 
                            WHERE brand.id_brand = :id 
                            ORDER BY material.name_material ASC LIMIT :start, :nbParPage");
    $query->bindParam(':id', $idBrand, PDO::PARAM_INT);
    $query->bindParam(':start', $start, PDO::PARAM_INT);
    $query->bindParam(':nbParPage', $nbParPage, PDO::PARAM_INT);
    $query->execute();
}

$materials = $query->fetchAll();
