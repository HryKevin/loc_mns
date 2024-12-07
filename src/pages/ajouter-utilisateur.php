<?php

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}

$title = 'Ajouter un utilisateur';
$description = 'Description de la page qui ajoute un utilisateurs';

require '../src/data/db-connect.php';
$query = "SELECT id_role, name_role FROM role";
$role = $dbh->query($query);



// Vérifie que le formulaire à bien été envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


    // Permettra de stocker les messages d'erreurs au fur-et-à-mesure
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
    if(empty($_POST['users']['id_role'])) {
        $errors['users']['id_role'] = "Veuillez selectionné un role pour l'utilisateur.";
    }

    // Validation du champs "Email"
    if (empty($_POST['users']['email']) || !filter_var($_POST['users']['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['users']['email'] = "Veuillez saisir un email.";
    }

    // Validation du champs "Password"
    if (empty($_POST['users']['password']) || !preg_match('/[a-zA-Z0-9\!\@\$\€\*\^\§\%\&]{16,32}/', $_POST['users']['password'])) {
        $errors['users']['password'] = "Le mot de passe est obligatoire et doit contenir entre 16 et 32 carcatères avec des minuscules, des MAJUSCULES et des caractères spéciaux comme @,$,€,*,^,§,%,&.";
    }

    // Si la variable erreurs est vide 
    if (empty($errors)) {

        // Vérification de l'email en BDD
        
        $email = $_POST['users']['email'];
        $query = $dbh->prepare("SELECT id_users FROM users WHERE email = :email");
        $query->execute(['email' => $email]);
        $userId = $query->fetch();

        if ($userId) {

            $errors['users']['email'] = "Cet email est déjà utilisé.";

        }else {

            $salt = "alkh1";
            $_POST['users']['password'] = password_hash($_POST['users']['password'] . $salt, PASSWORD_DEFAULT);
            
            $query = $dbh->prepare("INSERT INTO users (firstname, lastname, email, password, id_role) VALUES (:firstname, :lastname, :email, :password, :id_role)");
            $query->execute($_POST['users']);
            
            if (!$dbh->lastInsertId()) {
                $errors['form'] = "Une erreur s'est produit lors de l'ajout de l'utilisateur. Contacter l'administrateur à l'adresse [email].";
            } else {
                
                $success = "L'inscription de l'utilisateur est réussi.";
            }
        }

        

    }
}
