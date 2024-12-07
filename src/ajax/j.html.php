<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Gestion des équipements et des emprunts.">
  <meta name="keywords" content="gestion, équipements, location, retour">
  <link href="assets/css/styles.css" rel="stylesheet">
  <title><?= $title ?? 'Application' ?></title>
</head>
<body>
  <?php if (isset($_SESSION['user_id'])) : ?>
    <div class="container-index">
      <div class="left-section-index">
        <!-- barre de navigation -->
      </div>
      <div class="right-section-index">
        <main>
        <!-- Contenu principal de la page -->
          <?php require '../templates/' . $page . '.html.php'; ?>
        </main>
      </div>
    </div>
  <?php endif; ?>
</body>
</html>
