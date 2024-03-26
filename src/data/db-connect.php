<?php

try{
    $host = 'localhost';
    $dbname = '';
    $username = 'root';
    $password = '';

    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
    exit;
}