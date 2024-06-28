<?php


$title = "Location";
$description = "Description de la page de location de matériel";


if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}



if (!empty($_GET['id'])) {
    require '../src/data/db-connect.php';

    // Récupérer l'ID de l'URL et l'ajouter aux données de la requête POST
    $_POST['loan']['id_materiel'] = $_GET['id'];

    // Préparer la requête avec un paramètre :id
    $query = $dbh->prepare("SELECT material.*, loan.* FROM material_loan_reason 
                            LEFT JOIN loan ON material_loan_reason.id_loan = loan.id_loan 
                            LEFT JOIN material ON material_loan_reason.id_material = material.id_material 
                            WHERE material.id_material = :id");

    // Exécuter la requête en liant la valeur de :id à l'ID récupéré de l'URL
    $query->execute(['id' => $_GET['id']]);

    // Récupérer les données de l'utilisateur
    $material = $query->fetch();





    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $errors = [];

        // Validation du champs "NOM"
        if (empty($_POST['users']['lastname']) || strlen($_POST['users']['lastname']) <= 1) {
            $errors['users']['lastname'] = "Veuillez saisir un nom, qui contient plus d'un caractère.";
        }

        // Validation du champs "Prénom"
        if (empty($_POST['users']['firstname']) || strlen($_POST['users']['firstname']) <= 1) {
            $errors['users']['firstname'] = "Veuillez saisir un prénom, qui contient plus d'un caractère.";
        }

        //Validation du champs "Rôle"
        if (empty($_POST['users']['id_role'])) {
            $errors['users']['id_role'] = "Veuillez sélectionner un rôle pour l'utilisateur.";
        }

        // Validation du champs "Email"
        if (empty($_POST['users']['email']) || !filter_var($_POST['users']['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['users']['email'] = "Veuillez saisir un email valide.";
        }

        // Si la variable erreurs est vide 
        if (empty($errors)) {
            // Effectuer les modifications dans la base de données
            $query = $dbh->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, id_role = :id_role WHERE id_users = :id_users");
            $query->execute($_POST['users']);

            // Vérifier si la mise à jour a réussi
            if ($query->rowCount() > 0) {
                $success = "Les modifications de l'utilisateur ont été enregistrées avec succès.";
            } else {
                $errors['form'] = "Une erreur s'est produite lors de la modification de l'utilisateur. Contactez l'administrateur à l'adresse [email].";
            }
        }
    }
}

$_POST['id'] = $_GET['id'];


$requete = "SELECT * FROM material WHERE id = :id";