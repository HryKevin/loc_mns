<?php

// Récupération du paramètre de la page
$page = !empty ($_GET['page']) ? $_GET['page'] : 'index';

// Vérification de l'existence de la page
$path = '../src/pages/' . $page . '.php';
if (file_exists($path)) {
    // Db connect et chargement des variables globales
    require "../src/data/db-connect.php";
    // Chargement des données pour la page
    require $path;
    // Inclusion du template correspondant à la page
    require '../templates/layout.html.php';
} else {
    // Erreur 404
    header('HTTP/1.1 404 Not Found');
    
}

