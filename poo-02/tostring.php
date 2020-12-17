<?php

class Main
{

    // METHODE MAGIQUE
    // PHP APPELLE CETTE METHODE AUTOMATIQUEMENT
    // QUAND ON UTILISE UN OBJET DANS UN CONTEXTE OU IL FAUT UN TEXTE
    // => CONVERSION AUTOMATIQUE D'UN OBJET EN TEXTE
    function __toString ()
    {
        $texteQuiRemplaceObjet = "<h1>CODE DU MAIN</h1>";
        return $texteQuiRemplaceObjet;
    }

    function produireCode ()
    {
        return "<h1>CODE DU MAIN</h1>";
    }
}

$objetMain = new Main;

// CONVERSION A LA MAIN D'UN OBJET EN TEXTE
$codeHTML = $objetMain->produireCode();

echo 
<<<x
<h1>CODE DU HEADER</h1>
$objetMain
$codeHTML
<h1>CODE DU FOOTER</h1>
x;

