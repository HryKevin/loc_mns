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
    $query = $dbh->prepare("
        SELECT *
        FROM material 
        LEFT JOIN material_loan_reason ON material.id_material = material_loan_reason.id_material
        LEFT JOIN loan ON material_loan_reason.id_loan = loan.id_loan
        LEFT JOIN localisation ON loan.id_localisation = localisation.id_localisation
        WHERE material.id_material = :id
    ");
    
    $query->execute(['id' => $_GET['id']]);
    $material = $query->fetch();
}  
  // Récupérer les périodes de location pour le matériel
    $stmt = $dbh->prepare("
        SELECT loan.date_loan, loan.date_return
        FROM loan
        LEFT JOIN material_loan_reason ON loan.id_loan = material_loan_reason.id_loan
        WHERE material_loan_reason.id_material = :id_material
        AND loan.date_loan IS NOT NULL
        AND loan.id_loan_status = 2
        ORDER BY loan.date_loan ASC
    ");
    $stmt->execute([':id_material' => $_GET['id']]);
    $periods = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les périodes de location

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['loan'])) {
    // Récupérer les informations du formulaire
    $start_date = $_POST['loan']['start_date'];
    $end_date = $_POST['loan']['end_date'];
    $comments = $_POST['loan']['comments'];
    $id_material = $_POST['loan']['id_materiel'];
    $user_id = $_SESSION['user_id'];
    $name_localisation = $_POST['loan']['name_localisation']; 

        // Vérification des dates avant d'aller plus loin
    if (strtotime($start_date) > strtotime($end_date)) {
        $errors['date'] = "La date de début doit être antérieure à la date de fin.";
    } elseif (strtotime($start_date) < time()) {
        $errors['date'] = "La date de début doit être à partir d'aujourd'hui ou dans le futur.";
    }

    // Vérifier si le matériel est déjà loué ou réservé pendant la période demandée
    $stmt = $dbh->prepare("
        SELECT loan.id_loan
        FROM loan
        LEFT JOIN material_loan_reason ON loan.id_loan = material_loan_reason.id_loan
        WHERE material_loan_reason.id_material = :id_material
        AND loan.id_loan_status = 2
        AND (
                -- Nouvelle période de location chevauche une location future
                (:start_date BETWEEN loan.date_loan AND loan.date_return)
                OR (:end_date BETWEEN loan.date_loan AND loan.date_return)
                OR (loan.date_loan BETWEEN :start_date AND :end_date)
            )
        )
    ");
    $stmt->execute([
        ':id_material' => $id_material,
        ':start_date' => $start_date,
        ':end_date' => $end_date
    ]);
    $existing_loan = $stmt->fetch();

    if ($existing_loan) {
        // Si un prêt en cours ou futur existe qui chevauche les dates demandées, on bloque
        $errors['loan'] = "Ce matériel est déjà réservé ou loué pour la période sélectionnée.";
    } else {
        // Insérer la nouvelle localisation
        $stmt = $dbh->prepare("INSERT INTO localisation (name_localisation) VALUES (:name_localisation)");
        $stmt->execute([':name_localisation' => $name_localisation]);

        // Récupérer l'ID de la nouvelle localisation insérée
        $id_localisation = $dbh->lastInsertId();

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
            header('Location: /?page=ensemble-materiel');
            exit;
        } else {
            $errors['submit'] = "Erreur lors de la location du matériel.";
        }
    }
}
