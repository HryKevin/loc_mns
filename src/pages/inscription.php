<?php

$title = 'Inscription';
$description = 'Description de la page d\'accueil';

if (isset($_POST['submit'])) {
    $errors = [];

    if (empty($_POST['users']['lastname'])) {
        $errors['users']['lastname'] = "Veuillez saisir un nom.";
    }

    if (empty($_POST['users']['firstname'])) {
        $errors['users']['firstname'] = "Veuillez saisir un prénom.";
    }

    if (empty($_POST['users']['email']) || !filter_var($_POST['users']['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['users']['email'] = "Veuillez saisir un email.";
    }

    if (empty($_POST['users']['password'])) {
        $errors['users']['password'][] = "Veuillez saisir un mot de passe.";
    } else {
        if (strlen($_POST['users']['password']) < 8) {
            $errors['users']['password'][] = "Votre mot de passe doit contenir au moins 8 caractères.";
        }

        if (!preg_match("#[0-9]+#", $_POST['users']['password'])) {
            $errors['users']['password'][] = "Votre mot de passe doit contenir au moins un chiffre.";
        }

        if (!preg_match("#[a-z]+#", $_POST['users']['password'])) {
            $errors['users']['password'][] = "Votre mot de passe doit contenir au moins une lettre minuscule.";
        }

        if (!preg_match("#[A-Z]+#", $_POST['users']['password'])) {
            $errors['users']['password'][] = "Votre mot de passe doit contenir au moins une lettre majuscule.";
        }

        if (!preg_match("/[!@#$%^&*-_]/", $_POST['users']['password'])) {
            $errors['users']['password'][] = "Votre mot de passe doit contenir au moins un caractère spécial.";
        }
    }

    if (empty($errors)) 
    {
        $_POST['users']['password'] = password_hash($_POST['users']['password'], PASSWORD_DEFAULT);
        require '../src/data/db-connect.php';
        $query = $dbh->prepare("INSERT INTO users (firstname, lastname, email, password, id_role) VALUES (:firstname, :lastname, :email, :password, 1)");
        $query->execute($_POST['users']);

        if (!$dbh->lastInsertId()) 
        {
            $errors['error'] = 'Erreur lors de la création de votre profil.';
        } else {
            header("Location: ?page=connexion");
            $success = "Votre inscription est réussi ! Connectez-vous maintenant.";
        }

    }
}