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

    <!-- FONT GAYATHRI TITRE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gayathri:wght@100;400;700&display=swap" rel="stylesheet">

    <!-- FONT GOLOS PARAGRAPHE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>

    <main>
        <?php require '../templates/' . $page . '.html.php'; ?>
    </main>

</body>

</html>