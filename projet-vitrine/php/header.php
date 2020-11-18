<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet Vitrine</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- COMMENTAIRE HTML -->
</head>

<body>
    <header>
        <img class="header__img" src="./assets/img/logo.jpg" alt="logo">
        <nav>
            <a href="index.php">Accueil</a>
            <a href="galerie.php">Galerie</a>
            <a href="contact.php">Contactez-Nous</a>
        </nav>
    </header>
    <main>
        <h1><?php echo $titre ?></h1>
        <p><?php echo $description ?? "TEXTE PAR DEFAUT" ?></p>
