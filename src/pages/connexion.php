<?php
$title = "Connexion";

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
  header('Location: /'); 
  exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_form_submit'])) {
  $errors = [];

  // Validation du champ "Email"
  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Le champ email est obligatoire et doit être une adresse email valide.';
  }

  // Validation du champ "Password"
  if (empty($_POST['password'])) {
    $errors['password'] = 'Le mot de passe est obligatoire.';
  }

  if (empty($errors)) {
    
    require '../src/data/db-connect.php';
    $email = $_POST['email'];
    $query = $dbh->prepare("SELECT * FROM users WHERE email = :email");
    $query->execute(['email' => $email]);
    $user = $query->fetch();

    if ($user) {
      $salt = "alkh1";
      $password = $_POST['password'] . $salt;
    

      if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id_users'];
        $_SESSION['user_role_id'] = $user['id_role']; 
        header('Location: /');
        exit;
      } else {
        $errors['email'] = 'Email ou le mot de passe est incorrect.';
        $errors['password'] = 'Email ou le mot de passe est incorrect.';
      }
    } else {
      $errors['email'] = 'Email ou le mot de passe est incorrect.';
      $errors['password'] = 'Email ou le mot de passe est incorrect.';
    }
  }
}
