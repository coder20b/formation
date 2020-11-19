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
            <!-- AJOUTER DU CODE PHP POUR PRODUIRE LE MEME CODE HTML POUR LES BALISES a -->
<?php
// tableau associatif
$a = [
    // "cle"        => "valeur"
    "index.php"     => 'Accueil',
    "galerie.php"   => 'Galerie',
    "contact.php"   => 'Contactez-Nous',
];
foreach($a as $cle => $valeur)
{
    // JE TESTE SI $valeur EST EGAL A $titre
    if ($valeur == $titre) 
    {
        echo 
        <<<html
            <a class="active" href="$cle">$valeur</a>

        html;
    
    }
    else
    {
        echo 
        <<<html
            <a class="" href="$cle">$valeur</a>
    
        html;

    }
}
?>
<!--
            <a href="index.php">Accueil</a>
            <a href="galerie.php">Galerie</a>
            <a href="contact.php">Contactez-Nous</a>
-->
        </nav>
    </header>
    <main>
        <h1><?php echo $titre ?></h1>
        <p><?php echo $description ?? "TEXTE PAR DEFAUT" ?></p>
