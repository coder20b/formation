<?php

// require_once "php/model/Model.php";
// require_once "php/view/View.php";
// ... 

// FONCTION DE CALLBACK => PHP QUI VA APPELER CETTE FONCTION AUTOMATIQUEMENT
function chargerFichier ($nomClasse)
{
    $tabFichier = glob("php/*/$nomClasse.php");
    foreach($tabFichier as $fichier)    // INUTILE CAR UN SEUL FICHIER
    {
        // DEBUG
        echo "<h3>JE CHARGE LE CODE DANS $fichier</h3>";
        require_once $fichier;
    }
}
// chargerFichier("Model");
// chargerFichier("View");

// PHP VA AUTOMATIQUEMENT APPELER LA FONCTION chargerFichier QUAND IL A BESOIN D'UNE CLASSE
// https://www.php.net/manual/fr/function.spl-autoload-register.php
spl_autoload_register("chargerFichier");

$objetModel = new Model;            // PHP APPELLE LA FONCTION DE CALLBACK chargerFichier("Model")
$objetModel->envoyerRequete();

$objetView = new View;              // PHP APPELLE LA FONCTION DE CALLBACK chargerFichier("View")
$objetView->afficherTitre();

