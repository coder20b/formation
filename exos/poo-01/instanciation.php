<?php

// EN FONCTIONNEL
// ETAPE 1: DECLARER LA FONCTION
function afficherTitre ($texte)
{
    echo "<h1>$texte</h1>";
}

// ETAPE 2: APPELER LA FONCTION
afficherTitre("exemple en fonctionnel");

// EN PROGRAMMATION PAR CLASSE (AVEC static)
// ETAPE 1: DECLARER LA CLASSE ET LA METHODE
class View
{
    // METHODE STATIC
    static function afficherTitre ($texte)
    {
        echo "<h1>$texte</h1>";    
    }
}

// ETAPE 2: APPELER LA METHODE static
View::afficherTitre("exemple en méthode static");

// EN PROGRAMMATION ORIENTE OBJET
// ETAPE 1: DECLARER LA CLASSE ET LA METHODE
class View2
{
    // METHODE D'OBJET (SANS static)
    function afficherTitre ($texte)
    {
        echo "<h1>$texte</h1>";   
    }
}

// ETAPE 2: CREER UN OBJET A PARTIR DE LA CLASSE (INSTANCIATION)
$objet = new View2;

// ETAPE 3: APPELER LA METHODE EN PASSANT PAR L'OBJET
$objet->afficherTitre("exemple en POO");








