<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gayathri:wght@100;400;700&family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">
  <title>
    <?= $title ?? '' ?>
  </title>
  <meta name="description" content="<?= $description ?? '' ?>">


  <!-- MAIN CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>
  <?php if (isset($_SESSION['user_id'])) : ?>

    <div class="container-index">
      <div class="logo-mobile"><img class="img-logo" src="assets/img/logo.svg" /></div>
      <div>
        <h1 class="visibility-hidden"><?= $title ?></h1>
      </div>
      <div class="left-section-index" id="nav">


        <!-- Menu Latéral -->
        <div>
          <div  id="close" class="visibility-hidden "><img src="assets/img/xmark.svg"></div>
          <div class="logo-section-sidebar">
            <img class="logo-computer" src="assets/img/logo_computer_locmns.svg" alt="logo-computer" />
            <img class="logo-computer" src="assets/img/logo_locmns.svg" alt="logo" />
            <img class="visibility-hidden logo-user" id="logoUser" src="assets/img/user.svg" alt="logo" />
          </div>
          <ul>
            <li><a href="/"> <img src="assets/img/house.svg" />Accueil</a></li>
            <li><a href="/?page=materiels"> <img src="assets/img/computer.svg" />Matériels</a></li>
            <li><a href="/"> <img src="assets/img/bell.svg" />Notifications</a></li>
            <li><a href="/?page=utilisateurs"> <img src="assets/img/users.svg" />Utilisateurs</a></li>
            <li><a href="/"> <img src="assets/img/gear.svg" />Réglages</a></li>
          </ul>
        </div>
        <div><a href="/?page=deconnexion"><img src="assets/img/door.svg" />
            Déconnexion</a>
        </div>
      </div>
      <div class="rigth-section-index" >
        <!-- Nav -->
        <div class="nav-bar">
          <div class="all-element-navbar">
            <h1><?= $title ?></h1>
          </div>
          <div class="element-nav-bar">
            <input class="input-search" type="text" /></input>
            <img class="search"  src="assets/img/magnifier.svg" />
            <img class="burger search" id="burger" src="assets/img/menu-burger.svg" />
            <img class="visibility-hidden-responsive" src="assets/img/user.svg" />
            <img class="visibility-hidden-responsive"  src="assets/img/chevron-down.svg" />
          </div>

        </div>
        <main>
          <?php require '../templates/' . $page . '.html.php'; ?>
        </main>
      <?php endif; ?>
      <?php if (empty($_SESSION['user_id'])) : ?>
        <main>
          <?php require '../templates/' . $page . '.html.php'; ?>
        </main>
      <?php endif; ?>
      <script src="./assets/js/menu-burger.js"></script>
</body>

</html>