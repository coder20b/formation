# formation

Formation Dev Fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    mardi 24/11

https://prod.liveshare.vsengsaas.visualstudio.com/join?005291A40E6D8857CA89D887291AC68E8B14

## Questions ?

## RESUME DE L'EPISODE PRECEDENT

    CETTE SEMAINE, ON SE PLACE DANS L'OPTIQUE DEVELOPPEMENT EN EQUIPE.
    LE VOLUME DE CODE D'UN DEV SUR UN AN => AUTOUR DE 100.000 LIGNES DE CODE.
    IL FAUT LES OUTILS POUR GERER CES VOLUMES DE CODE 100.000 - 1.000.000 LIGNES DE CODE.

    QUELLES SONT LES TECHNIQUES ?

    * SYSTEME D'EXPLOITATION
    REPARTIR LE CODE DANS DES FICHIERS
    QUAND ON A BEAUCOUP DE FICHIERS, ON LES ORGANISE DANS DES DOSSIERS
    ET QUAND BEAUCOUP DE DOSSIERS, ON CREE DES SOUS-DOSSIERS

    ON A UNE RECETTE DE FABRICATION (DESIGN PATTERNS)    
    => MVC 
    => Model View Controller
    => CONSEIL: ORGANISER SON CODE EN 3 PARTIES

    EN PLUS, ON A DES TECHNIQUES DE PROGRAMMATION (COMPLEMENTAIRES AU FICHIERS ET DOSSIERS)
    POUR NOUS AIDER A ORGANISER NOTRE CODE

    => PROGRAMMATION FONCTIONNELLE
    => TRES IMPORTANT, CAR FONDAMENTAL
    => RANGER NOTRE CODE DANS DES FONCTIONS

```php
<?php

// ETAPE 1
// DEFINITION/DECLARATION DE LA FONCTION
// => CODE EN ATTENTE
function afficherTexte ()
{
    // ECRIRE VOTRE CODE ICI
    // ...
}

function afficherArticle ()
{
    // ECRIRE VOTRE CODE ICI
    // ...
}

// ETAPE 2
// APPELER LA FONCTION (AVEC SON NOM)
// => ACTIVE LE CODE RANGE DANS LA FONCTION {}
afficherArticle();

?>
```

    UNE FONCTION EST UNE BOITE 
    QUI PEUT RECEVOIR DES VALEURS EN ENTREES
    ET QUI PEUT PRODUIRE UNE VALEUR EN SORTIE
    (LES ENTREES ET SORTIE SONT OPTIONNELS...)

```php
<?php

// ETAPE 1
function calculerResultat ($entree1, $entree2)
{
    $resultat = 0;
    // ...

    echo "ce texte est affiché";

    return $resultat;   // PRODUIT LA VALEUR DE SORTIE
    // LE PROGRAMME ARRETE LE CODE DE LA FONCTION APRES UN return

    echo "ce texte ne sera jamais affiché";
}

// ETAPE 2
$sortie = calculerResultat(10, 20); 
// ON FOURNIT LES VALEURS DES ENTREES
// $entree1 = 10
// $entree2 = 20
// ET ON RECUPERE LA VALEUR DE SORTIE DANS $sortie

?>
```

    COMBINAISON:
    DANS LE CODE D'UNE FONCTION, ON PEUT AJOUTER UN APPEL A UNE AUTRE FONCTION

    LIMITES DE LA PROGRAMMATION FONCTIONNELLE   (ANNEES 80)
    => SUFFISANT POUR AUTOUR DE 10.000 LIGNES DE CODE
    => MAIS INSUFFISANT SUR DES VOLUMES DE 100.000 OU 1.000.000 LIGNES DE CODE

    ON SE RETROUVE AVEC BEAUCOUP DE FONCTIONS
    => IL FAUT POUVOIR LES RANGER
    => PROGRAMMATION ORIENTE OBJET              (ANNEES 90)
    => CREES POUR TRAVAILLER EN EQUIPE DE DEV

```php
<?php

class MaClasseA
{
    // METHODE => UNE FONCTION RANGEE DANS UNE CLASSE
    function afficherTexte ()
    {
        // ECRIRE VOTRE CODE ICI...
        // ...
    }

    function afficherTitre ()
    {
        // ECRIRE VOTRE CODE ICI...
        // ...
    }

}

class MaClasseB
{
    function calculerResultat ()
    {
        // ECRIRE VOTRE CODE ICI...
        // ...
    }
}

?>
```

    NOTE: ET APRES LES CLASSES, IL Y A D'AUTRES BOITES ?
    OUI, EN PHP, ON A UNE BOITE namespace QUI SERT A RANGER LES CLASSES... ;-p

```php
<?php

namespace MonEspace1
{
    class MaClasseA
    {
        // METHODE => UNE FONCTION RANGEE DANS UNE CLASSE
        function afficherTexte ()
        {
            // ECRIRE VOTRE CODE ICI...
            // ...
        }

        function afficherTitre ()
        {
            // ECRIRE VOTRE CODE ICI...
            // ...
        }

    }

}

?>
```

## PROGRAMMATION PAR CLASSE (ASSEZ SIMPLE COMME LES FONCTIONS...)

```php
<?php

// ETAPE1: DEFINITION
// TRADITION: ON COMMENCE LE NOM D'UNE CLASSE AVEC UNE MAJUSCULE
class MaClasse
{
    // SI ON AJOUTE LE MOT static
    // => ON CREE UNE METHODE DE CLASSE
    static function calculer ()
    {

    }
}

class MaClasse2
{
    static function afficher ()
    {
        // ON PEUT APPELER UNE METHODE D'UNE AUTRE CLASSE
        MaClasse::calculer();
    }
}

// ETAPE2: APPEL DE LA METHODE
MaClasse::calculer();


?>
```

## EN PHP: LIEN ENTRE FICHIERS ET CLASSES

    EN PHP, QUAND ON VA DEVELOPPER EN POO STANDARD
    UNE CLASSE SERA DANS SON FICHIER
    exemple:
    LE FICHIER MaClasse.php
    CONTIENDRA LE CODE LA CLASSE MaClasse

    => PHP A DES OUTILS POUR OPTIMISER LES PERFORMANCES AVEC CETTE ORGANISATION
    => CHARGEMENT AUTOMATIQUE DE CODE

## PORTEE DES VARIABLES

    MALHEUREUSEMENT DIFFERENT DE JS...

    EN PHP, QUAND ON AJOUTE DES VARIABLES DANS UNE FONCTION
    => ON CREE DES VARIABLES LOCALES
    => PHP CREE LA VARIABLE AU MOMENT DE L'APPEL DE LA FONCTION
        ET DETRUIT LA VARIABLE A LA FIN DE L'APPEL DE LA FONCTION

    EN PRATIQUE, C'EST BIEN POUR LE DEV
    => PERMET DE REUTILISER LES MEMES NOMS DE VARIABLES DANS DIFFERENTES FONCTIONS

    (UN PEU COMME let EN JS...)

```php
<?php

// ETAPE 1: DECLARATION
function calculerResultat ()
{
    $nombre = 20;   // VARIABLE LOCALE PHP CREE CETTE VARIABLE A CHAQUE APPEL DE FONCTION
  
    // ...

    // ICI A LA FIN DE L'APPEL DE LA FONCTION PHP DETRUIT $nombre
}

function calculerSomme ()
{
    $nombre = 10;   // VARIABLE LOCALE PHP CREE CETTE VARIABLE A CHAQUE APPEL DE FONCTION
  
    // ...

    // ICI A LA FIN DE L'APPEL DE LA FONCTION PHP DETRUIT $nombre
    return $nombre; // RENVOIE LA VALEUR MEMORISEE DANS LA VARIABLE LOCALE
}

// AVANT UN APPEL
echo $nombre;   // ERREUR $nombre N'EXISTE PAS ICI

// APPEL 1
calculerResultat();     // CREATION ET DESTRUCTION DE $nombre

// APRES UN APPEL
echo $nombre;   // ERREUR $nombre N'EXISTE PAS ICI

// APPEL 2
calculerResultat();     // CREATION ET DESTRUCTION DE $nombre

?>
```

## VARIABLE GLOBALE EN PROGRAMMATION FONCTIONNELLE

    EN PHP, SI ON CREE UNE VARIABLE EN DEHORS D'UNE FONCTION
    => C'EST UNE VARIABLE GLOBALE
    => PRATIQUE: ON PEUT UTILISER UNE VARIABLE GLOBALE A TRAVERS 
        require_once
        require
        include
        include_once

    PAR CONTRE, LES FONCTIONS BLOQUENT LES VARIABLES GLOBALES
    IL FAUT AJOUTER UNE LIGNE global $maVariableGlobale;
    POUR ANNONCER QU'ON VA UTILISER UNE VARIABLE GLOBALE

```php
<?php

// VARIABLE GLOBALE
$texte = "UN TEXTE GLOBAL";


function afficher ()
{
    echo "<h1>$texte</h1>";     // ERREUR CAR ON NE PEUT PAS DIRECTEMENT UTILISER UNE VARIABLE GLOBALE

}

function calculer ()
{
    global $texte;              // ANNONCE CLAIREMENT QUE $texte EST UNE VARIABLE GLOBALE
    echo "<h1>$texte</h1>";     // ERREUR CAR ON NE PEUT PAS DIRECTEMENT UTILISER UNE VARIABLE GLOBALE

}


?>
```

## PROGRAMMATION PAR CLASSE ET PROPRIETES static


```php
<?php

$texteGlobal = "MON TEXTE GLOBAL";              // VARIABLE GLOBALE

class MaConfig
{
    static $titreSite = "titre du site";        // PROPRIETE STATIC DE CLASSE
}

class MaClasse
{
    // PROPRIETES DE CLASSE static
    // UNE PROPRIETE EST UNE VARIABLE RANGEE DANS UNE CLASSE
    static $texte = "MON TEXTE DE CLASSE";      // PROPRIETE

    // METHODES DE CLASSE static
    static function afficherTexte ()
    {
        // ...
        $texteLocal = "MON TEXTE LOCAL";        // VARIABLE LOCALE

        // ON PEUT UTILISER UNE PROPRIETE EN AJOUTANT SA CLASSE DEVANT
        echo MaClasse::$texte;

        echo MaConfig::$titreSite;              // PRATIQUE: ON PEUT UTILISER LA PROPRIETE D'UNE AUTRE CLASSE
    }
}

// ON PEUT UTILISER UNE PROPRIETE EN AJOUTANT SA CLASSE DEVANT
echo MaClasse::$texte;

?>
```

## VARIABLE static DE FONCTION

    ON A DES VARIABLES static DE FONCTION
    ENTRE UNE VARIABLE LOCALE ET UNE VARIABLE GLOBALE

```php
<?php

function afficherTexte ()
{
    $texte = "texte local"; // variable locale
    static $nombre = 0;     // variable locale static (ligne exécutée seulement au premier appel...)
                            // bizarre: la variable sera créé au premier appel de la fonction
                            // mais ne sera pas détruite

    echo "<h1>$texte $nombre</h1>";
    $nombre++;              // on incremente le nombre
    // COMME $nombre EST static, PHP NE DETRUIT PAS $nombre
}

afficherTexte();        // texte local 0
afficherTexte();        // texte local 1
afficherTexte();        // texte local 2

?>
```

    PAUSE ET REPRISE A 11H20...


## EN PRATIQUE: ON PEUT FAIRE SIMPLE

    UTILISER DES VARIABLES LOCALES DANS UNE FONCTION
    => LA PLUPART DES SCENARIOS

    SI ON A BESOIN DE MEMORISER UNE INFO AU DELA DE L'APPEL D'UNE FONCTION
    => LE PLUS SIMPLE UTILISER UNE PROPRIETE static DE CLASSE


## BATTLEDEV

    https://battledev.blogdumoderateur.com/

    CORRIGES DES ANCIENS BATTLEDEV...
    https://www.isograd.com/FR/solutionconcours.php?contest_id=63&que_str_id=&reg_typ_id=2


    PAUSE DEJEUNER A 12H45 
    ET REPRISE A 13H45...

## PROJET BLOG

    AJOUTER UN FORMULAIRE D'INSCRIPTION A UNE NEWSLETTER
    => DANS UNE SECTION DE LA PAGE D'ACCUEIL
    => AJOUTER LE CODE PHP POUR TRAITER CE FORMULAIRE
    => ENREGISTRER LES INFOS DANS UN FICHIER newsletter.txt

## FORMULAIRES DANS UN SITE WEB ?

    FORMULAIRE 
    * DE CONTACT
    * DE NEWSLETTER
    * DE CREATION DE COMPTE
    * DE MOT DE PASSE OUBLIE
    * DE CHANGEMENT DE MOT DE PASSE
    * DE OUBLI TON IDENTIFIANT
    * DE CHANGEMENT DE PROFIL
    * DE PAIEMENT
    * DE PRISE DE COMMANDE (PANIER)
    * DE LIVRAISON
    * DE RECHERCHE
    * DE PRESENCE (SIGNATURE)
    * DE LOGIN (IDENTIFICATION)
    * DE LOGOUT
    * DE CHAT (MESSAGERIE...)
    * DE COMMENTAIRE (TWITTER, FB, etc...)
    * DE LIKE (BOUTON)
    * ...

    TRES IMPORTANT: LES FORMULAIRES SONT PARTOUT
    => MOYEN D'INTERGAIR AVEC VOS UTILISATEURS
    => TECHNIQUEMENT VOTRE VIE DE DEV WEB TOURNE AUTOUR DES FORMULAIRES

## CHEVAL DE TROIE

    LES GRECS ONT FAIT SEMBLANT D'OFFRIR UN GRAND CHEVAL EN BOIS
    COMME SIGNE DE LEUR DEFAITE.
    MAIS ILS ETAIENT CACHES DANS LE CHEVAL ET LES TROYENS ONT FAIT ENTRER LES GRECS DANS LEUR VILLE EN ACCEPTANT LE CHEVAL.
    => LES TROYENS SE SONT FAIT MASSACRER PAR LES GRECS
    (SOUVENEZ-VOUS DE BRAD PITT...)

    AVEC LES FORMULAIRES, ON S'EXPOSE AUX GENS MALINTENTIONNES...
    => IL FAUT DEVENIR PARANO ET SE PROTEGER

    FORMATION CYBER SECURITE
    https://secnumacademie.gouv.fr/

## EXERCICE: CREER UNE FONCTION QUI ENVOIE UN EMAIL

    POUR CENTRALISER LE CODE D'ENVOI D'UN EMAIL
    CREER UNE FONCTION POUR CENTRALISER CE CODE DANS UN SEUL FICHIER

    



























































