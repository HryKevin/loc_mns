<?php

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}

$title = "Modifier un matériel";
$description = "Déscription de la page de modification d'un matériel";

if (!empty($_GET['id'])) {
    require '../src/data/db-connect.php';
  
    // Récupérer l'ID de l'URL et l'ajouter aux données de la requête POST
    $_POST['material']['id_material'] = $_GET['id'];

    // Préparer la requête avec un paramètre :id
    $query = $dbh->prepare("SELECT * FROM material 
                             LEFT JOIN category ON category.id_category = material.id_category 
                            LEFT JOIN model ON model.id_model = category.id_category 
                            LEFT JOIN brand ON brand.id_brand = category.id_category
                            WHERE id_material = :id");

    // Exécuter la requête en liant la valeur de :id à l'ID récupéré de l'URL
    $query->execute(['id' => $_GET['id']]);

    // Récupérer les données de l'utilisateur
    $material = $query->fetch();


   // Récupérer la liste des categories
    $query = "SELECT id_category, name_category FROM category";
    $category = $dbh->query($query);

    // Récupérer la liste des marques
    $query = "SELECT id_brand, name_brand FROM brand";
    $brand = $dbh->query($query);
      
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $errors = [];

        // Validation du champs "NOM"
        if (empty($_POST['material']['name_material']) || strlen($_POST['material']['name_material']) <= 1) {
            $errors['material']['name_material'] = "Veuillez saisir un nom, qui contient plus d'un caractère.";
        }

        // Validation du champs "Description"
        if (empty($_POST['material']['description']) || strlen($_POST['material']['description']) <= 1) {
            $errors['material']['description'] = "Veuillez saisir une description, qui contient plus d'un caractère.";
        }

        // Validation du champs "Numéros de série"
        if (empty($_POST['material']['serial_number']) || strlen($_POST['material']['serial_number']) <= 1) {
            $errors['material']['serial_number'] = "Veuillez sélectionner un numéro de série, qui contient plus d'un caractère.";
        }

        // Validation du champs "Date d'achat"
        if (empty($_POST['material']['date_purchase'])) {
            $errors['material']['date_purchase'] = "Veuillez saisir une date d'achat valide.";
        }

        // Validation du champs "Marque"
        if (empty($_POST['material']['name_brand']) || strlen($_POST['material']['name_brand']) <= 1) {
            $errors['material']['name_brand'] = "Veuillez saisir une marque, qui contient plus d'un caractère.";
        }

        // Validation du champs "Dimension"
        if (empty($_POST['material']['screen_size']) || strlen($_POST['material']['screen_size']) <= 1) {
            $errors['material']['screen_size'] = "Veuillez saisir une dimension valide.";
        }

        // Validation du champs "Catégorie"
        if (empty($_POST['material']['name_category']) || strlen($_POST['material']['name_category']) <= 1) {
            $errors['material']['name_category'] = "Veuillez saisir une catégorie valide.";
        }

        // Validation des champs spécifiques aux Laptops/Tablettes
        if ($_POST['material']['name_category'] === 'Laptop' || $_POST['material']['name_category'] === 'Tablette') {
            if (empty($_POST['material']['processor']) || strlen($_POST['material']['processor']) <= 1) {
                $errors['material']['processor'] = "Veuillez saisir un processeur valide.";
            }
            if (empty($_POST['material']['storage_memory']) || strlen($_POST['material']['storage_memory']) <= 1) {
                $errors['material']['storage_memory'] = "Veuillez saisir une mémoire valide.";
            }
            if (empty($_POST['material']['ram']) || strlen($_POST['material']['ram']) <= 1) {
                $errors['material']['ram'] = "Veuillez saisir une RAM valide.";
            }
        }

        // Si la variable erreurs est vide
        if (empty($errors)) {
            // Effectuer les modifications dans la base de données
            $query = $dbh->prepare("UPDATE material SET 
                name_material = :name_material, 
                description = :description, 
                serial_number = :serial_number,
                date_purchase = :date_purchase,
                screen_size = :screen_size,
                processor = :processor,
                storage_memory = :storage_memory,
                ram = :ram
                WHERE id_material = :id_material");

            // Passer les paramètres au tableau
            $query->execute([
                'name_material' => $_POST['material']['name_material'],
                'description' => $_POST['material']['description'],
                'serial_number' => $_POST['material']['serial_number'],
                'date_purchase' => $_POST['material']['date_purchase'],
                'screen_size' => $_POST['material']['screen_size'],
                'processor' => $_POST['material']['processor'] ?? null,
                'storage_memory' => $_POST['material']['storage_memory'] ?? null,
                'ram' => $_POST['material']['ram'] ?? null,
                'id_material' => $_POST['material']['id_material']
            ]);

            // Vérifier si la mise à jour a réussi
            if ($query->rowCount() > 0) {
                
                $success = "Les modifications de l'utilisateur ont été enregistrées avec succès.";
                header('Location: /?page=ensemble-materiel');
                exit;
            } else {
                $errors['form'] = "Une erreur s'est produite lors de la modification de l'utilisateur. Contactez l'administrateur à l'adresse [email].";
            }
        }
    }
}
