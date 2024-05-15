<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Gayathri:wght@100;400;700&family=Golos+Text:wght@400..900&display=swap"
        rel="stylesheet">
    <title>
        <?= $title ?? '' ?>
    </title>
    <meta name="description" content="<?= $description ?? '' ?>">


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">



</head>

<body>

<div class="container-index">
  <div class="logo-mobile"><img class="img-logo"src="assets/img/logo.svg"/></div>
  <div class="left-section-index">
    <!-- Menu Latéral -->
    <div>
      <div class="logo-section-sidebar">
        <img src="assets/img/logo_computer_locmns.svg" alt="logo-computer" />
        <img src="assets/img/logo_locmns.svg" alt="logo" />
      </div>
      <ul>
        <li><a href="/"> <img src="assets/img/house.svg" />Accueil</a></li>
        <li><a href="/?page=materiels"> <img src="assets/img/computer.svg" />Matériels</a></li>
        <li><a href="/"> <img src="assets/img/bell.svg" />Notifications</a></li>
        <li><a href="/?page=utilisateurs"> <img src="assets/img/users.svg" />Utilisateurs</a></li>
        <li><a href="/"> <img src="assets/img/gear.svg" />Réglages</a></li>
      </ul>
    </div>
    <div><a href="/"><img src="assets/img/door.svg" />
        Déconnexion</a>
    </div>
  </div>
  <div class="rigth-section-index">
    <!-- Nav -->
    <div class="nav-bar">
       <h1><?= $title ?></h1>
      <div class="element-nav-bar">
        <input class="input-search" type="text" /></input>
        <img class="search" src="assets/img/magnifier.svg" />
        <img src="assets/img/user.svg" />
        <img src="assets/img/chevron-down.svg" />
      </div>
      </div>
      <!-- MAIN -->
    <main>
        <?php require '../templates/' . $page . '.html.php'; ?>
    </main>

</body>

</html>