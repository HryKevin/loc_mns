<?php

$title = "Ajouter plusieurs utilisateurs";
$description = "Description de la page ajouter plusieurs utilisateurs";

// Inclure la connexion à la base de données
require '../src/data/db-connect.php';

if (isset($_POST['submit'])) {
    $errors = [];
    $separator = ','; // Par défaut, ou ajouter un champ pour le sélectionner

    if (is_uploaded_file($_FILES['csv_file']['tmp_name'])) {
        $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
        $headers = fgetcsv($file, 1000, $separator);

        try {
            // Connexion à la base de données avec PDO (déjà inclus avec db-connect.php)
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            while (($data = fgetcsv($file, 1000, $separator)) !== FALSE) {
                $user = [
                    'firstname' => $data[0],
                    'lastname' => $data[1],
                    'email' => $data[2],
                    'password' => $data[3],
                    'id_role' => $data[4]
                ];

                // Valider les données utilisateur
                validateUser($user, $errors, $dbh);

                if (empty($errors)) {
                    incrementUser($user, $dbh);
                } else {
                    break;
                }
            }
            fclose($file);
        } catch (PDOException $e) {
            $errors[] = "Erreur de connexion à la base de données : " . $e->getMessage();
        }

        if (empty($errors)) {
            $success = "Tous les utilisateurs ont été ajoutés avec succès.";
        }
    } else {
        $errors[] = "Erreur lors de l'upload du fichier.";
    }
}

function validateUser($user, &$errors, $dbh)
{
    // Validation du champ "Prénom"
    if (empty($user['firstname']) || strlen($user['firstname']) <= 1) {
        $errors[] = "Veuillez saisir un prénom qui contient plus d'un caractère.";
    }

    // Validation du champ "NOM"
    if (empty($user['lastname']) || strlen($user['lastname']) <= 1) {
        $errors[] = "Veuillez saisir un nom qui contient plus d'un caractère.";
    }

    // Validation du champ "Email"
    if (empty($user['email']) || !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Veuillez saisir un email valide.";
    } else {
        // Vérifier l'absence de doublon pour l'email
        $stmt = $dbh->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute(['email' => $user['email']]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $errors[] = "Le fichier contient des emails en doublons.";
        }
    }

    // Validation du champ "Password"
    if (empty($user['password']) || !preg_match('/[a-zA-Z0-9\!\@\$\€\*\^\§\%\&]{16,32}$/', $user['password'])) {
        $errors[] = "Le mot de passe est obligatoire et doit contenir entre 16 et 32 caractères avec des minuscules, des MAJUSCULES et des caractères spéciaux comme @,$,€,*,^,§,%,&.";
    }

    // Validation du champ "id_role"
    if (empty($user['id_role'])) {
        $errors[] = "Veuillez sélectionner un rôle pour l'utilisateur.";
    }
}


function incrementUser($user, $dbh)
{
    $salt = $salt = "alkh1";
    // Fonction pour ajouter l'utilisateur dans la base de données
    $stmt = $dbh->prepare("INSERT INTO users (firstname, lastname, email, password, id_role) VALUES (:firstname, :lastname, :email, :password, :id_role)");
    $stmt->execute([
        'firstname' => $user['firstname'],
        'lastname' => $user['lastname'],
        'email' => $user['email'],
        'password' => password_hash($user['password'] . $salt, PASSWORD_DEFAULT),
        'id_role' => $user['id_role'],
    ]);
}
