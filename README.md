# formation

Formation Dev Fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    lundi 23/11

https://prod.liveshare.vsengsaas.visualstudio.com/join?DAAD5A29F4E1368AE619698EE91DC5AD7EA5

## Questions ?

## RESUME DE LA SEMAINE DERNIER

    1   PAGE            ONE PAGE
    10  PAGES           SITE VITRINE

    CETTE SEMAINE
    100 PAGES           BLOG

## OBJECTIFS TECHNIQUES

    PHP PROGRAMMATION FONCTIONNELLE
    PHP PROGRAMMATION PAR CLASSES (BASES DE LA PROGRAMMATION ORIENTEE OBJET)

    SQL

    => BASES POUR DEVELOPPER DES GROS PROJETS WEB

    FRAMEWORK MVC

    POUR LES 17 JOURS QUI VIENNENT... ;-p

## PHP ET PROGRAMMATION FONCTIONNELLE

    CREER DES FONCTIONS POUR SON CODE

    LE DEVELOPPEUR ECRIT BEAUCOUP DE CODE
    (ENVIRON 2000 LIGNES DE CODE PAR SEMAINE... 100.000 LIGNES DE CODE PAR AN... POUR UN DEV...)

    PROGRAMMATION FONCTIONNELLE
    => TECHNIQUE TRADITIONNELLE (DEPUIS ANNEES 80...)
    => PERMET DE RANGER ET ORGANISER VOTRE CODE

    UN DEV PASSE SON TEMPS A CREER DES FONCTIONS
    => ET VOUS RANGEZ VOTRE CODE DANS DES FONCTIONS...

    100 LIGNES DE CODE => 1 FONCTION
    10.000 LIGNES DE CODE => 100 FONCTIONS
    => POUR GERER DES VOLUMES DE CODE PLUS GRAND
    => PROGRAMMATION ORIENTE OBJET (100.000 ET 1.000.000 ET PLUS...)

    DANS UNE CLASSE ON PEUT RANGER 100 FONCTIONS
    100 * 100 * 100 = 1.000.000 LIGNES DE CODE
    => COOL AVEC LA POO
    => ON PEUT GERER DES MILLIONS DE LIGNES DE CODE ;-p

## CREER UNE FONCTION

    DONNER UN NOM POUR DISTINGUER LES FONCTIONS
    conseil: UTILISER UN VERBE

```php
<?php

    // ETAPE 1
    // DECLARATION OU DEFINITION D'UNE FONCTION
    // => LE CODE DANS {} EST EN ATTENTE
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

    // ON PEUT APPELER LA FONCTION PLUSIEURS FOIS AVEC DES VALEURS DE PARAMETRES DIFFERENTS
    $volume2 = calculerVolume(3, 4, 5);    

    echo "<h1>LE VOLUME2 EST $volume2 m3</h1>";   // 60


?>
```

## EXEMPLE DE FONCTION


```php
<?php

// CREER UNE FONCTION QUI CALCULE LE PRIX TTC 
// AVEC EN PARAMETRES LE PRIX HT ET LE TAUX DE TVA
// exemple: ON VEUT POUVOIR APPELER LA FONCTION?
//      $prixTTC = calculerTTC(100, 20);    // prixHT = 100 et tva = 20%

// ETAPE 1
// DECLARATION DE LA FONCTION
function calculerTTC ($prixHT, $taux)
{
    return $prixHT * (1 + $taux / 100);
}

$prix1 = calculerTTC(100, 20);

echo "<h1>LE PRIX TTC EST $prix1 euros </h1>";

?>
```

## PARAMETRES PAR DEFAUT DANS UNE FONCTION

    ON PEUT DONNER DES VALEURS PAR DEFAUT AUX PARAMETRES
    MAIS LA CONTRAINTE EST DE LES METTRE A LA FIN
    LES PARAMETRES OBLIGATOIRES (SANS VALEUR PAR DEFAUT)
    DOIVENT ETRE EN PREMIER DANS LA LISTE DES PARAMETRES

```php
<?php

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

$prix1 = calculerTTC(100);      // $prixHT = 100 ET PAR DEFAUT $taux=20

echo "<h1>LE PRIX TTC EST $prix1 euros </h1>";

$prix2 = calculerTTC(150, 5);   // $prixHT = 100 ET $taux=5 (ET PAS LA VALEUR PAR DEFAUT)
                                // 157.5

echo "<h1>LE PRIX TTC EST $prix2 euros </h1>";


function afficherValeur ($a, $b, $c="texte1", $d="texte2")
{
    echo "<h1>$a $b $c $d</h1>";
}

afficherValeur("texte pour a", "texte pour b"); 
                // AU MINIMUM, JE DOIS FOURNIR LES VALEURS DES 2 PREMIERS PARAMETRES


?>
```

## PROGRAMMATION PAR CLASSE

    ON ENTRE DANS LE DOMAINE DE LA PROGRAMMATION ORIENTE OBJET (POO)
    (LA PROGRAMMATION PAR CLASSE N'EST QU'UNE PARTIE DE LA POO...)

    => DANS LES ANNEES 90
    => BESOIN DE GERER DES PROGRAMMES PLUS VOLUMINEUX
    => 100.000 ET 1.000.000 LIGNES DE CODE...

    => LA PROGRAMMATION ORIENTE OBJET EST DEVENUE LE STANDARD 

    LA PROGRAMMATION PAR CLASSE PERMET DE FAIRE UNE TRANSITION FACILE
    DEPUIS LA PROGRAMMATION FONCTIONNELLE

```php
<?php

// AVEC LA POO, ON A UNE BOITE EN PLUS
// => UNE CLASSE
// (conseil: utiliser un nom commun pour le nom de la classe...)

class MaClasse
{
    function afficherTexte ()
    {
        // ...
    }

    function afficherTitre ()
    {
        // ...
    }

}

class MaClasse2
{
    function calculerValeur ()
    {
        // ...
    }

    function calculerPrix ()
    {
        // ...
    }

}

?>    
```

### PROGRAMMATION PAR CLASSE

```php
<?php

// PROGRAMMATION FONCTIONNELLE
function afficherTitre ($titre)
{
    echo "<h1>$titre</h1>";
}

afficherTitre("coucou");

// POUR PASSER FACILEMENT EN POO
// => COMMENCER AVEC LA PROGRAMMATION PAR CLASSE

// ON PEUT AVOIR LA MEME CHOSE AVEC LA PROGRAMMATION PAR CLASSE
class MaClasse
{
    // ATTENTION: ON RAJOUTE static AVANT function
    // VOCABULAIRE: UNE FONCTION RANGEE DANS UNE CLASSE EST APPELEE METHODE
    static function afficherTitre ($titre)
    {
        echo "<h1>$titre</h1>";
    }

}

// POUR APPELER LA METHODE
MaClasse::afficherTitre("bonjour");

?>
```


    PAUSE ET ON REPREND A 11H15

## EXO1

    CREER UN FICHIER PAR EXERCICE
    exo01.php

    CREER UNE FONCTION QUI CALCULE LE VOLUME D'UNE PIECE
    EN PARAMETRE ON FOURNIRA LES 3 DIMENSIONS
    $longueur
    $largeur 
    $hauteur

    ET ON TESTERA AVEC 
    $longueur = 4
    $largeur  = 3
    $hauteur  = 2
    // RESULTAT ATTENDU: 24m3

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS
    
## EXO2

    CREER UN FICHIER PAR EXERCICE
    exo02.php
    
    CREER UNE FONCTION QUI CALCULE LA SURFACE DES 4 MURS
    EN PARAMETRE ON FOURNIRA LES 3 DIMENSIONS
    $longueur
    $largeur 
    $hauteur

    ET ON TESTERA AVEC 
    $longueur = 4
    $largeur  = 3
    $hauteur  = 2
    // RESULTAT ATTENDU: 28m2

    GRAND MUR = $longueur * $hauteur 
    PETIT MUR = $largeur * $hauteur

    SURFACE_4_MURS = 2 * ( GRAND_MUR + PETIT_MUR ) 

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

## EXO3

    CREER UN FICHIER PAR EXERCICE
    exo03.php

    CREER UNE FONCTION QUI CALCULE LE PLUS PETIT (OU EGAL) ENTRE 2 NOMBRES
    EN PARAMETRE, ON FOURNIRA LES 2 NOMBRES
    $nombre1
    $nombre2

    ET ON TESTERA AVEC 
    $nombre1 = 10
    $nombre2 = 20
    // RESULTAT ATTENDU 10

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

## EXO4

    CREER UN FICHIER PAR EXERCICE
    exo04.php
    
    CREER UNE FONCTION QUI CALCULE LE PLUS PETIT ENTRE 3 NOMBRES
    EN PARAMETRE, ON FOURNIRA LES 3 NOMBRES
    $nombre1
    $nombre2
    $nombre3

    ET ON TESTERA AVEC 
    $nombre1 = 10
    $nombre2 = 2
    $nombre3 = 7
    // RESULTAT ATTENDU 2

    ET ON TESTERA AVEC 
    $nombre1 = 1
    $nombre2 = 7
    $nombre3 = 19
    // RESULTAT ATTENDU 1

    ET ON TESTERA AVEC 
    $nombre1 = 12
    $nombre2 = 71
    $nombre3 = 9
    // RESULTAT ATTENDU 9

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

## EXO5

    CREER UN FICHIER PAR EXERCICE
    exo05.php
    
    CREER UNE FONCTION QUI TROUVE LA PLUS PETITE VALEUR DANS UN TABLEAU DE NOMBRES
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE NOMBRES
    $tabNombre

    ET ON TESTERA AVEC 
    $tabNombre = [ 12, 3, 45, 1, 100, 35 ];
    // RESULTAT ATTENDU 1

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

## EXO6

    CREER UN FICHIER PAR EXERCICE
    exo06.php
    
    CREER UNE FONCTION QUI CALCULE LA SOMME DES VALEURS DANS UN TABLEAU DE NOMBRES
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE NOMBRES
    $tabNombre

    ET ON TESTERA AVEC 
    $tabNombre = [ 12, 3, 45, 1, 100, 35 ];
    // RESULTAT ATTENDU 196

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

## EXO7

    CREER UN FICHIER PAR EXERCICE
    exo07.php

    CREER UNE FONCTION QUI RENVOIE 
    UN TEXTE CONCATENANT LES VALEURS D'UN TABLEAU DE LETTRES
    EN SEPARANT CHAQUE LETTRE AVEC UNE VIRGULE
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE LETTRES
    $tabLettre

    ET ON TESTERA AVEC 
    $tabLettre = [ "a", "b", "c", "d" ];
    // RESULTAT ATTENDU "a,b,c,d"
    // ATTENTION: PAS DE VIRGULE AU DEBUT OU A LA FIN

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

## EXO8

    CREER UN FICHIER PAR EXERCICE
    exo08.php

    CREER UNE FONCTION QUI PREND EN PARAMETRE UN TABLEAU ORDONNE
    DE CHEMINS D'IMAGE $tabImage
    ET QUI AFFICHE UNE LISTE D'IMAGES EN HTML

    EXEMPLE:
    creerGalerie([ "assets/img/photo1.jpg", "assets/img/photo2.jpg", "assets/img/photo3.jpg" ]);

    ET QUI PRODUIRA LE CODE HTML
    <img src="assets/img/photo1.jpg">
    <img src="assets/img/photo2.jpg">
    <img src="assets/img/photo3.jpg">

    EXTRA:
    * CREER LE CODE EN PROGRAMMATION PAR CLASSE
    * CREER LE CODE EN JS

## EXO9

    CREER UN FICHIER PAR EXERCICE
    exo09.php

    CREER UNE FONCTION QUI PREND EN PARAMETRE UN TABLEAU ASSOCIATIF
    ET QUI AFFICHE UN MENU EN HTML

    EXEMPLE:
    creerMenu([ 
        "accueil" => "index.php", 
        "galerie" => "galerie.php", 
        "contact" => "contact.php" 
        ]);

    ET QUI PRODUIRA LE CODE HTML
    <nav>
        <a href="index.php">accueil</a>
        <a href="galerie.php">galerie</a>
        <a href="contact.php">contact</a>
    </nav>


## MILLIONS DE LIGNES DE CODE

    COMPARAISON DES ORDRES DE GRANDEUR SUR LES VOLUMES DE CODE...
    https://informationisbeautiful.net/visualizations/million-lines-of-code/


    PAUSE DEJEUNER ET REPRISE A 13H45...


## PROJET BLOG

    100 PAGES POUR UN PROJET WEB

    SITE OU UN AUTEUR PEUT PUBLIER REGULIEREMENT DES ARTICLES
    IL Y A UNE PAGE QUI AFFICHE LA LISTE DES ARTICLES
    ET CHAQUE ARTICLE A AUSSI SA PROPRE PAGE
    DANS LA PAGE QUI AFFICHE LA LISTE DES ARTICLES, IL Y AURA DES HYPERLIENS
    QUI PERMETTENT D'ALLER VERS LA PAGE D'UN SEUL ARTICLE


    PAGES:
    Accueil
    Blog/News/Actus     => LISTE DES ARTICLES
    Article(S)          => CHAQUE ARTICLE A SA PROPRE PAGE *
                            => VA CREER DES PAGES EN PLUS PAR RAPPORT AU SITE VITRINE
    Galerie
    Contact

    COTE DEV:
    ON VA SE PREPARER A CODER PLUS DE PHP
    => ON VA AVOIR PLUS DE FICHIERS
    => ON VA AVOIR AUSSI PLUS DE DOSSIERS POUR LES ORGANISER

        Model
        View
        Controller

    L'ORGANISATION MVC FAIT PARTIE DES DESIGN PATTERNS
    DESIGN PATTERNS     => SCHEMA DE CONCEPTION
    traduction perso    => RECETTE DE FABRICATION 

    DESIGN PATTERNS PROVIENNENT DE RETOURS D'EXPERIENCE
    (BEST PRACTICES EN ANGLAIS...)

    MVC EST UN DES DESIGN PATTERNS (10-20 DESIGN PATTERNS...)

## Model View Controller

    DANS UN PROJET, IL PEUT Y AVOIR PLUSIEURS MVC...

    COTE BACK: 
    ON VA ORGANISER NOTRE CODE PHP EN 3 PARTIES
    * Model
    * View
    * Controller

    COTE FRONT: HTML, CSS, JS
    HTML        DOCUMENT CONTENU DE LA PAGE
    CSS         MISE EN FORME
    JS          INTERACTION ANIMATION
    ?
    * Model             HTML
    * View              CSS
    * Controller        JS

    Model 
    => Modelisation 
    => TRAVAIL DE DEFINIR LES INFORMATIONS DU MONDE REEL QUI NOUS INTERESSENT DANS NOTRE PROJET WEB

    Exemple: Boutique en ligne pour vendre des fleurs
        Clients qui vont acheter des bouquets
        => ON A BESOIN DE STOCKER DES INFOS SUR LES CLIENTS
        => On va modéliser un client
                date anniversaire
                age
                email
                nom
                numero carte bleu
                adresse
                code postal
                couleur cheveux ???
                couleur favorite    => couleur fleur
                ...

    ATTENTION: LA LOI RGPD VOUS CONSTRAINT A POUVOIR JUSTIFIER LES INFOS UTILES
        CERTAINS INFOS NE PEUVENT PAS ETRE OBLIGATOIRES


    CHAQUE PROJET DEMANDE UNE MODELISATION SPECIFIQUE


    View
    => Afficher
    => Tout ce qui est visuel, présentation

    Controller
    => Controleur
    => Code qui gère les interactions avec l'utilisateur
    => Principe général: Paranoia NE JAMAIS FAIRE CONFIANCE AUX INCONNUS
    => SECURITE: VERIFIER TOUTES LES ACTIONS DES UTILISATEURS

## MVC COTE BACK

    NAVIGATEUR                  SERVEUR WEB

    PAGE WEB        <====       TEMPLATE        + INFOS      
                                VIEW            + MODEL

    FORMULAIRE      ====>       TRAITER LES INFOS DU FORMULAIRE
                                => SECURITE POUR VERIFIER QUE LES INFOS SONT VALIDES
                                => CONTROLLER

    EN PRATIQUE:
    ON VA AJOUTER DES SOUS-DOSSIERS DANS LE DOSSIER php


    php/
        model/
        view/
        controller/


## EXERCICE EN AUTONOMIE

    RECONSTRUIRE LE PROJET VITRINE DANS LE PROJET BLOG
    EN ADAPTANT LE CODE POUR GERER LES SOUS-DOSSIERS
        php/
            model/
            view/
            controller/


    ENSUITE, POUR COMPRENDRE L'EVOLUTION
    AJOUTER SUR LA PAGE D'ACCUEIL UN FORMULAIRE D'INSCRIPTION A UNE NEWSLETTER

        nom
        email
        bouton  'inscrivez-moi'

    ET ON ENREGISTRERA CES INFORMATIONS DANS UN FICHIER 
        newsletter.txt


    CHECKPOINT A 15H20...

    PAUSE ET REPRISE A 16H15



























