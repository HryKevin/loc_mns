<?php
$title = "Catégories";
$description = "Déscription de la page catégories";

require '../src/data/db-connect.php';

$query = "SELECT id_category, name_category, image FROM category";
$category = $dbh->query($query);
$categories = $category->fetchAll();
