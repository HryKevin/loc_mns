<?php

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}

$title = "Modifier un matériel";
$description = "Description de la page de modification d'un matériel";

if (!empty($_GET['id'])) {
    require '../src/data/db-connect.php';
  
    // Récupérer l'ID de l'URL et l'ajouter aux données de la requête POST
    $_POST['material']['id_material'] = $_GET['id'];




// Récupère les détails du matériel à modifier
$query = $dbh->prepare("SELECT * FROM material 
                        LEFT JOIN category ON category.id_category = material.id_category 
                        LEFT JOIN model ON model.id_model = material.id_model 
                        LEFT JOIN brand ON brand.id_brand = model.id_brand
                        WHERE id_material = :id");
$query->execute(['id' => $_GET['id']]);
$material = $query->fetch();


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



    // // Si la catégorie est 'Laptop' ou 'Tablette', valider les champs spécifiques
    // if ($_POST['material']['id_model'] == 1 || $_POST['material']['id_category'] == 2) {
    //     if (empty($_POST['material']['processor']) || strlen($_POST['material']['processor']) <= 1) {
    //         $errors['material']['processor'] = "Veuillez saisir un processeur valide.";
    //     }
    //     if (empty($_POST['material']['storage_memory']) || strlen($_POST['material']['storage_memory']) <= 1) {
    //         $errors['material']['storage_memory'] = "Veuillez saisir une mémoire valide.";
    //     }
    //     if (empty($_POST['material']['ram']) || strlen($_POST['material']['ram']) <= 1) {
    //         $errors['material']['ram'] = "Veuillez saisir une RAM valide.";
    //     }
    // }

    // if (!empty($_POST)) {
    //     var_dump($_POST['material']['name_material']);
    //     var_dump($_POST['material']['description']);
    //     var_dump($_POST['material']['serial_number']);
    //     var_dump($_POST['material']['date_purchase']);
    //     var_dump($_POST['material']['screen_size']);
    //     var_dump($_POST['material']['processor'] ?? null);
    //     var_dump($_POST['material']['storage_memory'] ?? null);
    //     var_dump($_POST['material']['ram'] ?? null);
    //     var_dump($_POST['material']['id_category'] ?? null);
    //     var_dump($_POST['material']['id_model'] ?? null);
    //     var_dump($_POST['material']['id_material'] ?? null);
    //     exit;
    // }

    if (empty($errors)) {
        try {
            // Mettre à jour le matériel
            $updateMaterialQuery = $dbh->prepare("UPDATE material SET 
                name_material = :name_material, 
                description = :description, 
                serial_number = :serial_number,
                date_purchase = :date_purchase,
                screen_size = :screen_size,
                processor = :processor,
                storage_memory = :storage_memory,
                ram = :ram,
                id_category = :id_category,
                id_model = :id_model
                WHERE id_material = :id");


            $updateMaterialQuery->execute([
                'name_material' => $_POST['material']['name_material'],
                'description' => $_POST['material']['description'],
                'serial_number' => $_POST['material']['serial_number'],
                'date_purchase' => $_POST['material']['date_purchase'],
                'screen_size' => $_POST['material']['screen_size'],
                'processor' => $_POST['material']['processor'] ?? null,
                'storage_memory' => $_POST['material']['storage_memory'] ?? null,
                'ram' => $_POST['material']['ram'] ?? null,
                'id_category' => $_POST['material']['id_category'],
                'id_model' => $_POST['material']['id_model'],
                'id' => $_GET['id']
            ]);

            // Vérifie si la mise à jour a réussi
            if ($updateMaterialQuery->rowCount() > 0) {

             
                // Redirection
                $_SESSION['success'] = "Les modifications du matériel ont été enregistrées avec succès.";
                header('Location: /?page=ensemble-materiel');
                exit;
            } else {
                $errors['form'] = "Une erreur s'est produite lors de la mise à jour du matériel.";
            }
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            $errors['form'] = "Erreur de base de données : " . $e->getMessage();
        }
    }
}
}
