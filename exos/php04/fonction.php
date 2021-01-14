<?php

    // ETAPE 1
    // DECLARATION OU DEFINITION D'UNE FONCTION
    // => LE CODE DANS {} EST EN ATTENTE
    // UNE FONCTION NE PEUT ETRE DEFINIE QU'UNE SEULE FOIS...
    function calculerVolume ($hauteur, $largeur, $longueur)
    {
        // ICI ON RANGERA NOTRE CODE
        $resultat = 0;

        // ICI LE DEV DOIT ECRIRE SON CODE
        // ...
        $resultat = $hauteur * $largeur * $longueur;

        return $resultat;   // UNE FONCTION PEUT PRODUIRE UNE VALEUR 
        // APRES UN return LE CODE DE LA FONCTION S'ARRETE
        // ON DIT QU'ON SORT DE LA FONCTION...
    }

    // ETAPE 2
    // ACTIVE LE CODE DE LA FONCTION
    // APPELER LA FONCTION
    // SI LA FONCTION PRODUIT UNE VALEUR DE RETOUR
    // ON PEUT UTILISER UNE VARIABLE POUR STOCKER CETTE VALEUR
    $volume = calculerVolume(2, 3, 4);    
                    // C'EST QUAND ON APPELLE LA FONCTION 
                    // QU'ON FOURNIT LES VALEURS AUX PARAMETRES
                    // DANS L'ORDRE DES PARAMETRES LORS DE LA DECLARATION
                    // PHP VA FAIRE 
                    // $hauteur     = 2
                    // $largeur     = 3
                    // $longueur    = 4

    echo "<h1>LE VOLUME EST $volume m3</h1>";   // 24

    // ON PEUT APPELER LA FONCTION PLUSIEURS FOIS AVEC DES VALEURS DE PARAMETRES DIFFERENTS
    $volume2 = calculerVolume(3, 4, 5);    

    echo "<h1>LE VOLUME2 EST $volume2 m3</h1>";   // 60



// CREER UNE FONCTION QUI CALCULE LE PRIX TTC 
// AVEC EN PARAMETRES LE PRIX HT ET LE TAUX DE TVA
// exemple: ON VEUT POUVOIR APPELER LA FONCTION?
//      $prixTTC = calculerTTC(100, 20);    // prixHT = 100 et tva = 20%

// ETAPE 1
// DECLARATION DE LA FONCTION
function calculerTTC ($prixHT, $taux=20)
{
    return $prixHT * (1 + $taux / 100);
}

$prix1 = calculerTTC(100);  // 120

echo "<h1>LE PRIX TTC EST $prix1 euros </h1>";

$prix2 = calculerTTC(150, 5);   // 157.5

echo "<h1>LE PRIX TTC EST $prix2 euros </h1>";

function afficherValeur ($a, $b, $c="texte1", $d="texte2")
{
    echo "<h1>$a $b $c $d</h1>";
}

afficherValeur("texte pour a", "texte pour b"); 
                // AU MINIMUM, JE DOIS FOURNIR LES VALEURS DES 2 PREMIERS PARAMETRES

afficherValeur("texteA", "texteB", "texteC"); 
// AU MINIMUM, JE DOIS FOURNIR LES VALEURS DES 2 PREMIERS PARAMETRES

afficherValeur("texteA", "texteB", "texteC", "texteD"); 
// AU MINIMUM, JE DOIS FOURNIR LES VALEURS DES 2 PREMIERS PARAMETRES


















?>
