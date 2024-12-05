<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Saiyan\'s Coaching'; ?></title>

    <?php if(isset($navbar)) : ?>
        <link rel="stylesheet" href="/assets/css/<?= $navbar; ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/css/<?= $style ?? 'stlAcceuil.css'; ?>">
    <link rel="stylesheet" href="/assets/css/stlFooter.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
