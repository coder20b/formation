<?php 

// ON EST DANS LA PAGE index.php
$titre = "ACCUEIL";
// cette valeur va remplacer le texte par défaut
$description = "TEXTE POUR LA PAGE D'ACCUEIL";

// ON RECOMPOSE LE CODE HTML EN ASSEMBLANT LES DIFFERENTS FICHIERS PHP
require_once "php/header.php"; 
require_once "php/section-index.php";
require_once "php/footer.php";

?>