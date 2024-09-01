<?php

$title = "Location";
$description = "Description de la page de location de matériel";

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}
$user_role_id = $_SESSION['user_role_id'];

$material = [];

if (!empty($_GET['id'])) {
    // Récupérer les informations du matériel
    $query = $dbh->prepare("SELECT * FROM material WHERE id_material = :id");
    $query->execute(['id' => $_GET['id']]);
    $material = $query->fetch();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['loan'])) {
    // Récupérer les informations du formulaire
    $start_date = $_POST['loan']['start_date'];
    $end_date = $_POST['loan']['end_date'];
    $comments = $_POST['loan']['comments'];
    $id_material = $_POST['loan']['id_materiel'];
    $user_id = $_SESSION['user_id'];
    $id_localisation = $_POST['loan']['id_localisation']; // Assure-toi que ce champ est inclus dans le formulaire

    // Insérer les données dans la table `loan`
    $stmt = $dbh->prepare("INSERT INTO loan (date_loan, comment, date_return, id_localisation, id_users, id_loan_status) VALUES (:start_date, :comments, :end_date, :id_localisation, :id_users, 1)");
    $success = $stmt->execute([
        ':start_date' => $start_date,
        ':comments' => $comments,
        ':end_date' => $end_date,
        ':id_localisation' => $id_localisation,
        ':id_users' => $user_id
    ]);

    if ($success) {
        $loan_id = $dbh->lastInsertId(); // Récupérer l'ID du prêt inséré
        // Associer le matériel au prêt dans `material_loan_reason`
        $stmt = $dbh->prepare("INSERT INTO material_loan_reason (id_material, id_loan, date_return) VALUES (:id_material, :id_loan, :end_date)");
        $stmt->execute([
            ':id_material' => $id_material,
            ':id_loan' => $loan_id,
            ':end_date' => $end_date
        ]);

        $_SESSION['success'] = "Matériel loué avec succès.";
        header('Location: /chemin/vers/ensemble-materiel.php'); // Mettre à jour avec le chemin réel vers la page "ensemble matériel"
        exit;
    } else {
        $errors['submit'] = "Erreur lors de la location du matériel.";
    }
}
