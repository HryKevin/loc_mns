<?php
$title = "Connexion";


// Vérifie que le formulaire à bien été envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_form_submit'])) {

  // Permettra de stocker les messages d'erreurs au fur-et-à-mesure
  $errors = [];

  // Validation du champs "Email"
  if (empty($_POST['users']['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['users']['email'] = 'Le champs email est obligatoire et doit être une adresse email valide';
  }

  // Validation du champs "Password"
  if (empty($_POST['users']['password']) ) {
    $errors['users']['password'] = 'Le mot de passe est obligatoire.';
  }

  if (empty($errors)) {
    require '../src/data/db-connect.php';

    // Vérification de l'email en BDD
    $email = $_POST['users']['email'];
    $query = $dbh->prepare("SELECT * FROM users WHERE email = :email");
    $query->execute(['email' => $email]);
    $customer = $query->fetch();
    

    if ($customer) {
      $salt = "alkh1";
      $password = $_POST['users']['email'] . $salt;

      if (password_verify($password, $customer['password'])) {
        // Authentification réussie
        // Ouverture de la session
        session_start();
        $_SESSION['user_id'] = $customer['id_users'];

        header('Location: /');
        exit;
      } else {
        $errors['users']['email'] = 'Email ou le mot de passe est incorrect';
        $errors['users']['password'] = 'Email ou le mot de passe est incorrect';
      }
    }
  }
};
