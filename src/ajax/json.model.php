<?php

try {

  $resultat = $dbh->prepare("
    SELECT model.id_model, model.name_model FROM model WHERE model.id_brand = :id_brand
  ");

  $resultat->execute(['id_brand' => $_GET['brandId']]);
  $models = $resultat->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['models' => $models]);

} catch (PDOException $e) {
  // En cas d'erreur afficher le message ci dessous
  echo "Error: " . $e->getMessage();
  die; // Si erreur on arrete la
}
