<?php

if (empty($_SESSION['user_id'])) {
    header('Location: /?page=connexion');
    exit;
}

$title = 'Modifier une marque';
$description = 'Description de la page qui modifie une marque';







if (!empty($_GET['id'])) {
    require '../src/data/db-connect.php';

    // Récupérer l'ID de l'URL et l'ajouter aux données de la requête POST
    $_POST['brand']['id_brand'] = $_GET['id'];

    // Préparer la requête avec un paramètre :id
    $query = $dbh->prepare("SELECT * FROM brand WHERE id_brand = :id");

    // Exécuter la requête en liant la valeur de :id à l'ID récupéré de l'URL
    $query->execute(['id' => $_GET['id']]);

    // Récupérer les données de la category
    $brand = $query->fetch();

}

// Vérifie que le formulaire a bien été envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    // Permettra de stocker les messages d'erreurs au fur-et-à-mesure
    $errors = [];

    // Validation du champ "NOM"
    if (empty($_POST['brand']['name_brand']) || strlen($_POST['brand']['name_brand']) <= 1) {
        $errors['category']['name_category'] = "Veuillez saisir un nom de catégorie, qui contient plus d'un caractère.";
    }

    // Validation du champ "Image"
    if (!isset($_FILES['brand']['error']['image']) || $_FILES['brand']['error']['image'] != UPLOAD_ERR_OK) {
        $errors['brand']['image'] = "Veuillez télécharger une image valide.";
    } else {
        // Vérification du type de fichier et de la taille si nécessaire
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($_FILES['brand']['tmp_name']['image']);
        if (!in_array($fileType, $allowedTypes)) {
            $errors['brand']['image'] = "Veuillez télécharger une image de type JPEG, PNG ou GIF.";
        }
    }

    // Si la variable erreurs est vide 
    if (empty($errors)) {


        // Gérer l'upload de l'image
        $uploadDir = 'C:\\Users\\Kevin\\Desktop\\Hary\\Projets\\Projets Fil Rouge\\loc-mns\\public\\assets\\img\\';  // Chemin absolu pour Windows
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);  // Créez le répertoire s'il n'existe pas
        }

        // Ajout de messages de débogage pour vérifier les permissions
        if (!is_writable($uploadDir)) {
            $errors['form'] = "Le répertoire de destination n'est pas accessible en écriture.";
        } else {
            $imagePath = $uploadDir . basename($_FILES['brand']['name']['image']);
            if (move_uploaded_file($_FILES['brand']['tmp_name']['image'], $imagePath)) {
                // Préparer et exécuter la requête d'Update
                $relativeImagePath = '/assets/img/' . basename($_FILES['brand']['name']['image']); // Chemin relatif pour stocker dans la base de données
                $query = $dbh->prepare("UPDATE brand
                        SET name_brand = :name_brand,
                            image = :image
                        WHERE id_brand = :id");
                $query->execute([
                    ':name_brand' => $_POST['brand']['name_brand'],
                    ':image' => $relativeImagePath, // Chemin relatif de l'image généré précédemment
                    ':id' => $_POST['brand']['brand']
                ]);

                if (!$dbh->lastInsertId()) {
                    $errors['form'] = "Une erreur s'est produite lors de l'ajout de la catégorie. Contactez l'administrateur à l'adresse [email].";
                } else {
                    $success = "La création de la nouvelle catégorie est réussie.";
                    // Rediriger vers une autre page ou afficher un message de succès
                    header('Location: /?page=marques'); // Par exemple, rediriger vers la liste des catégories
                    exit;
                }
            } else {
                $errors['form'] = "Une erreur s'est produite lors du téléchargement de l'image.";
                // Ajout d'un message de débogage pour move_uploaded_file
                $errors['form'] .= ' Erreur de move_uploaded_file: ' . $_FILES['brand']['error']['image'];
            }
        }
    }
}

