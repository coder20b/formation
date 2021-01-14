<?php

// PROGRAMMATION FONCTIONNELLE
function afficherTitre ($titre)
{
    echo "<h1>$titre</h1>";
}

afficherTitre("coucou");

// ON PEUT AVOIR LA MEME CHOSE AVEC LA PROGRAMMATION PAR CLASSE
class MaClasse
{
    // PROGRAMMATION PAR CLASSE (static)
    // ATTENTION: ON RAJOUTE static AVANT function
    // VOCABULAIRE: UNE FONCTION RANGEE DANS UNE CLASSE EST APPELEE METHODE
    static function afficherTitre ($titre="texte par défaut")
    {
        echo "<h1>$titre</h1>";
    }

    // PROGRAMMTION ORIENTE OBJET (sans static)
    function afficherArticle ()
    {

    }
}

// POUR APPELER LA METHODE
MaClasse::afficherTitre("bonjour");

MaClasse::afficherTitre();

?>