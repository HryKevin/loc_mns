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
    $query = $dbh->prepare("SELECT * FROM material WHERE id_material = :id");

    // Exécuter la requête en liant la valeur de :id à l'ID récupéré de l'URL
    $query->execute(['id' => $_GET['id']]);

    // Récupérer les données de l'utilisateur
    $material = $query->fetch();

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

        //Validation du champs "Numéros de serie"
        if (empty($_POST['material']['serial_number']|| strlen($_POST['material']['description']) <= 1)) {
            $errors['material']['serial_number'] = "Veuillez sélectionner un numéro de série, qui contien plus d'un caractère.";
        }

        // Validation du champs "Email"
        if (empty($_POST['material']['email']) || !filter_var($_POST['material']['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['material']['email'] = "Veuillez saisir un email valide.";
        }

        // Si la variable erreurs est vide 
        if (empty($errors)) {
            // Effectuer les modifications dans la base de données
            $query = $dbh->prepare("UPDATE material SET name_material = :name_material, description = :description, serial_number = :serial_number WHERE id_material = :id_material");
            $query->execute($_POST['material']);

            // Vérifier si la mise à jour a réussi
            if ($query->rowCount() > 0) {
                $success = "Les modifications de l'utilisateur ont été enregistrées avec succès.";
            } else {
                $errors['form'] = "Une erreur s'est produite lors de la modification de l'utilisateur. Contactez l'administrateur à l'adresse [email].";
            }
        }
    }
}