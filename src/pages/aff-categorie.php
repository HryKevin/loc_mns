<?php

$title = 'Matériels';
$description = 'Description de la page des matériels';

require '../src/data/db-connect.php';

$idCategory = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nbParPage = 10;
$search = isset($_GET['search']) ? strtolower($_GET['search']) : '';

// Calcul du nombre total de pages pour les matériels dans la catégorie
if (!empty($search)) {
    $query = $dbh->prepare("SELECT COUNT(*) AS nbmaterials FROM material WHERE id_category = :id AND name_material LIKE :search");
    $query->execute(['id' => $idCategory, 'search' => "%$search%"]);
} else {
    $query = $dbh->prepare("SELECT COUNT(*) AS nbmaterials FROM material WHERE id_category = :id");
    $query->execute(['id' => $idCategory]);
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
                            LEFT JOIN model ON model.id_model = material.id_model 
                            LEFT JOIN brand ON brand.id_brand = model.id_brand 
                            WHERE material.id_category = :id AND material.name_material LIKE :search 
                            ORDER BY material.name_material ASC LIMIT :start, :nbParPage");
    $query->bindParam(':id', $idCategory, PDO::PARAM_INT);
    $query->bindParam(':search', $search, PDO::PARAM_STR);
    $query->bindParam(':start', $start, PDO::PARAM_INT);
    $query->bindParam(':nbParPage', $nbParPage, PDO::PARAM_INT);
    $query->execute();
} else {
    $query = $dbh->prepare("SELECT material.*, category.name_category, model.name_model, brand.name_brand FROM material 
                            LEFT JOIN category ON category.id_category = material.id_category 
                            LEFT JOIN model ON model.id_model = material.id_model 
                            LEFT JOIN brand ON brand.id_brand = model.id_brand 
                            WHERE material.id_category = :id 
                            ORDER BY material.name_material ASC LIMIT :start, :nbParPage");
    $query->bindParam(':id', $idCategory, PDO::PARAM_INT);
    $query->bindParam(':start', $start, PDO::PARAM_INT);
    $query->bindParam(':nbParPage', $nbParPage, PDO::PARAM_INT);
    $query->execute();
}

$materials = $query->fetchAll(PDO::FETCH_ASSOC);