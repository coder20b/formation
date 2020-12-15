<?php

// UTILITE DE functions.php
// => ACTIVER DES FONCTIONNALITES DISPONIBLES DE WORDPRESS
// => AJOUTER NOS FONCTIONS (WP CHARGE CE FICHIER AVANT LES FICHIERS TEMPLATES...)

function afficherCoucou ()
{
    echo "<h4>AH QUE COUCOU</h4>";
}

// DECLARER LES MENUS QUE MON THEME PROPOSE
$tabAssoMenu = [
    "primary" => "MENU PRINCIPAL",
    "footer"  => "MENU PIED DE PAGE",
];
// https://developer.wordpress.org/reference/functions/register_nav_menus/
register_nav_menus($tabAssoMenu);

// POUR AVOIR LES IMAGES A LA UNE...
add_theme_support( 'post-thumbnails' );

