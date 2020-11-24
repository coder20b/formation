<?php 

// VARIABLES GLOBALES
// ON EST DANS LA PAGE index.php
$titre = "Accueil";
// cette valeur va remplacer le texte par défaut
$description = "TEXTE POUR LA PAGE D'ACCUEIL";

// ON RECOMPOSE LE CODE HTML EN ASSEMBLANT LES DIFFERENTS FICHIERS PHP
require_once "php/view/header.php"; 
require_once "php/view/section-index.php";
require_once "php/view/footer.php";

?>