<?php

// try { // Récuperer les champs du formulaire et faire un INSERT INTO dans la BDD
//   $resultat = $dbh->prepare("SELECT * FROM model 
//   LEFT JOIN material ON model.id_model=material.id_model 
//   LEFT JOIN category ON material.id_category=category.id_category 
//   LEFT JOIN brand ON model.id_brand=brand.id_brand WHERE category.id_category=:id_category");


//   $resultat->execute(['id_category' => $_GET['categoryId']]);
//   $data = $resultat->fetchAll(PDO::FETCH_ASSOC);


//   echo (json_encode($data));
// } catch (PDOException $e) {
//   // En cas d'erreur afficher le message ci dessous
//   echo "Error: " . $e->getMessage();
//   die; // Si erreur on arrete la
// }
try { 
  // Connexion à la base de données (assurez-vous que $dbh est correctement défini)
  
  // Récupérer les marques pour une catégorie donnée
  $resultat = $dbh->prepare("
      SELECT brand.id_brand, brand.name_brand 
      FROM brand 
      INNER JOIN model ON brand.id_brand = model.id_brand 
      INNER JOIN material ON model.id_model = material.id_model 
      WHERE material.id_category = :id_category
  ");
  $resultat->execute(['id_category' => $_GET['categoryId']]);
  $brands = $resultat->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['brands' => $brands]);

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  die;
}



