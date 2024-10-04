<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/styles.css" rel="stylesheet">
  <title><?= $title ?? 'Application' ?></title>
</head>
<body>
  <?php if (isset($_SESSION['user_id'])) : ?>
    <div class="container-index">
      <header>
      <div class="left-section-index">
        <!-- barre de navigation -->
      </div>
    </header>
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
