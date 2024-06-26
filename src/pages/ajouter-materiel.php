<?php

$title = "Ajouter du matériel";
$description = "Description de la page de modification d'un matériel";

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}

// Récupére la liste des models pour le formulaire de sélection
$query = "SELECT id_model, name_model FROM model";
$models = $dbh->query($query);

// Récupére la liste des marques pour le formulaire de sélection
$query = "SELECT id_brand, name_brand FROM brand";
$brands = $dbh->query($query);

// Récupére la liste des categories pour le formulaire de sélection
$query = "SELECT id_category, name_category FROM category";
$categories = $dbh->query($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $errors = [];

    // Validation du champ "Nom"
    if (empty($_POST['material']['name_material']) || strlen($_POST['material']['name_material']) <= 1) {
        $errors['material']['name_material'] = "Veuillez saisir un nom contenant plus d'un caractère.";
    }

    // Validation du champ "Description"
    if (empty($_POST['material']['description']) || strlen($_POST['material']['description']) <= 1) {
        $errors['material']['description'] = "Veuillez saisir une description contenant plus d'un caractère.";
    }

    // Validation du champ "Numéro de série"
    if (empty($_POST['material']['serial_number']) || strlen($_POST['material']['serial_number']) <= 1) {
        $errors['material']['serial_number'] = "Veuillez saisir un numéro de série contenant plus d'un caractère.";
    }

    // Validation du champ "Date d'achat"
    if (empty($_POST['material']['date_purchase'])) {
        $errors['material']['date_purchase'] = "Veuillez saisir une date d'achat valide.";
    }

    // Validation du champ "Marque"



    // Validation du champ "Model"
    if (empty($_POST['material']['id_model'])) {
        $errors['material']['id_model'] = "Veuillez sélectionner une catégorie valide.";
    }


    // Validation du champ "Catégorie"
    if (empty($_POST['material']['id_category'])) {
        $errors['material']['id_category'] = "Veuillez sélectionner une catégorie valide.";
    }

    // Validation du champ "Dimension"
    if (empty($_POST['material']['screen_size']) || strlen($_POST['material']['screen_size']) <= 1) {
        $errors['material']['screen_size'] = "Veuillez saisir une dimension valide.";
    }
    var_dump($_POST);
    var_dump($errors);




    if (empty($errors)) {
        try {
            // Mettre à jour le matériel
            $materialQuery = $dbh->prepare("INSERT INTO material (name_material,description,serial_number,date_purchase,screen_size,processor,storage_memory,ram,id_model,id_category) VALUES (:name_material,:description,:serial_number,:date_purchase,:screen_size,:processor,:storage_memory,:ram,:id_model,:id_category)");

            $materialQuery->execute([
                'name_material' => $_POST['material']['name_material'],
                'description' => $_POST['material']['description'],
                'serial_number' => $_POST['material']['serial_number'],
                'date_purchase' => $_POST['material']['date_purchase'],
                'screen_size' => $_POST['material']['screen_size'],
                'processor' => $_POST['material']['processor'] ?? null,
                'storage_memory' => $_POST['material']['storage_memory'] ?? null,
                'ram' => $_POST['material']['ram'] ?? null,
                'id_category' => $_POST['material']['id_category'],
                'id_model' => $_POST['material']['id_model']
            ]);



            // Vérifie si la mise à jour a réussi
            if (!$dbh->lastInsertId()) {
                $errors['form'] = "Une erreur s'est produite lors de l'ajout du matériel.";
            } else {

                $success = "L'ajout du matériel a bien été effectué.";
            }
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            $errors['form'] = "Erreur de base de données : " . $e->getMessage();
        }
    }
}
