# formation

Formation Dev Fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    jeudi 19/11

https://prod.liveshare.vsengsaas.visualstudio.com/join?A2718615E960E190225D77F7318CFAC0525D


## questions ?

## RESUME DE L'EPISODE PRECEDENT

    DEMARRAGE AVEC PHP
    OUTIL COTE BACK SUR LE SERVEUR WEB (LAMP)

    OUTIL POUR AIDER A PRODUIRE DU HTML
    DECOUPAGE LE CODE HTML DANS DIFFERENTS FICHIERS
    ET UTILISER require_once DE PHP POUR RASSEMBLER LES MORCEAUX

    => SUR UN PROJET WEB, ON A BESOIN DE CREER DES TEMPLATES
    => DANS LES TEMPLATES, ON A DES ELEMENTS COMMUNS
            header
            footer
            => IDENTITE VISUELLE

    => PRINCIPE IMPORTANT 
    => DRY
    => Don't Repeat Yourself

    => REVUE DE CODE POUR OPTIMISER SON CODE
    => DETECTER LES DUPLICATIONS DE CODE DANS DIFFERENTS FICHIERS
    => ET ESSAYER DE CENTRALISER LE CODE DANS UN SEUL FICHIER

    => AVANTAGE: SI ON MODIFIE LE CODE DANS LE FICHIER COMMUN (header, footer)
    => LA MODIFICATION SERA PROPAGEE PAR PHP DANS TOUTES LES PAGES

## PHP COMME LANGAGE DE PROGRAMMATION


    https://www.php.net/manual/fr/langref.php

    LES VARIABLES
    https://www.php.net/manual/fr/language.variables.php

    LES TEXTES (CHAINES DE CARACTERES / STRING)
    https://www.php.net/manual/fr/language.types.string.php

```php
<?php

// LIGNE DE COMMENTAIRE

// ON PEUT CREER DES VARIABLES
// = OPERATEUR D'AFFECTATION
// TRES IMPORTANT: = SERT A MEMORISER UNE VALEUR DANS UNE VARIABLE
$texte = "le texte mémorisée dans la variable aujourd'hui";


// ?? OPERATEUR COALESCENT UTILE DANS LE CAS OU ON N'A PAS DEFINI DE VALEUR AVANT
echo $texte ?? "valeur par défaut";

// EN PHP, COMME PHP SERT A PRODUIRE DU HTML (TEXTE)
// ON A PLEIN DE MOYENS DE MANIPULER LES TEXTES

$texte      = 'un texte avec des guillemets simples';
$codehtml   = '<h1 class="titre1">c\'est le titre</h1>';

// PHP PROPOSE DE CREER SES PROPRES DELIMITEURS
$texte  =
<<<mabalise

    <h1 class="titre1">c'est le titre</h1>

mabalise;

/*
// EN JS, ON UTILISE LE BACKTICK `...`
// let texte = 
    `
        <h1 class="titre1">c'est la titre</h1>
    `
*/

?>
```


## CONCATENATION DE TEXTES

    OPERATEUR DE CONCATENATION
    => COLLER DES BOUTS DE TEXTES ENSEMBLE
    
    EN JS C'EST AVEC +
    MALHEUREUSEMENT, EN PHP C'EST AVEC .
    (+ SERT A FAIRE UNE ADDITION)

```php
<?php

$texte1 = "bonjour";
$texte2 = "jeudi";

$phrase =  $texte1 . $texte2;           // "bonjourjeudi"

$phrase =  $texte1 . " " . $texte2;     // "bonjour jeudi"

// ASTUCE PLUS COMPACTE AVEC PHP
// AVEC "" ON PEUT INSERER DES VARIABLES POUR CONCATENER
$phrase =  "$texte1 $texte2";           // "bonjour jeudi"

// SYNTAXE HEREDOC
// ON PEUT AUSI UTILISER DES VARIABLES
$phrase =
    <<<mabalise
        $texte1 $texte2
    mabalise;
    // ATTENTION: NE PAS METTRE D'ESPACE APRES ;

?>
```

## VALEURS NUMERIQUES (NOMBRES ENTIERS ET DECIMAUX)

```php
<?php

$nombre             = 1;
$decimal            = 1.2;
$nombreNegatif      = -3;

// OPERATEURS SUR LES NOMBRES
$nombre1 = 1;
$nombre2 = 2;

// ADDITION +
$somme = $nombre1 + $nombre2;   // 3

// SOUSTRACTION -
$difference = $nombre2 - $nombre1; // 1

// MULTIPLICATION *
$produit = $somme * $nombre2;   // 6

// DIVISION /
$quotient = $produit / $nombre2;    // 3

// MODULO %
// RESTE DE LA DIVISION ENTIERE
$modulo = 10 % 3;       // 1

// ON PEUT COMBINER AVEC DES PARENTHESES
$prixHT = 100;
$tva    = 20;

$prixTTC = $prixHT * (100 + $tva) / 100;
$prixTTC = $prixHT * (1 + $tva / 100);

$promo = 10;    // PROMO DE 10%

$prixFinal = $prixTTC - ($promo / 100) * $prixTTC;
$prixFinal = $prixTTC * (1 - ($promo / 100));

?>
```

## VALEURS BOOLEENS

    true    => VRAI 
    false   => FAUX

    https://www.php.net/manual/fr/language.operators.logical.php

```php
<?php

$test1 = true;
$test2 = false;

// OPERATEURS LOGIQUES
// ET   => IL FAUT QUE TOUTES LES CONDITIONS SOIENT true
$test3 = $test1 && $test2;  // false

// OU   => IL FAUT AU MOINS UNE CONDITION SOIT true
$test4 = $test1 || $test2;  // true

// NEGATION
$test5 = !$test4;  // false

// ATTENTION A NE PAS CONFONDRE AVEC !=
// (OPERATEUR DE COMPARAISON DIFFERENT)

?>
```

## OPERATEUR DE COMPARAISON

    ==      EGALITE DE VALEUR
    !=      DIFFERENCE DE VALEUR
    >       SUPERIEUR STRICT
    <       INFERIEUR STRICT
    >=      SUPERIEUR OU EGAL
    <=      INFERIEUR OU EGAL
    ===     EQUIVALENCE (EGALTITE DE VALEUR ET DE TYPE)
    !==     NON EQUIVALENCE (DIFFERENCE DE VALEUR OU DE TYPE)

```php
<?php

// ON PEUT COMPARER DES TEXTES
$texte1 = "coucou";
$texte2 = "bonjour";

$test1 = ($texte1 == $texte2);      // $test1 = false
$test2 = ($texte1 != $texte2);      // $test2 = true


// ON PEUT COMPARER DES NOMBRES
$nombre1 = 10;
$nombre2 = 20;

$test3 = ($nombre1 > $nombre2);     // $test3 = false

?>
```

## OPERATEUR D'INCREMENTATION

```php
<?php

$nombre = 10;
$nombre = $nombre +1;   // INCREMENTATION DE 1  $nombre = 11
// ECRITURE RACCOURCI ++ => ON AJOUTE 1
$nombre++;              // $nombre = 12

$nombre += 2;           // $nombre = 14
// $nombre = $nombre + 2

$nombre -= 10;          // $nombre = 4
// $nombre = $nombre - 10

// -- => ON ENLEVE 1
$nombre--;              // $nombre = 3

?>
```

## LES TABLEAUX ORDONNES

    https://www.php.net/manual/fr/language.types.array.php

    SI ON A BESOIN DE STOCKER PLUSIEURS VALEURS DANS UNE VARIABLE

```php
<?php


// ON DELIMITE LE TABLEAU AVEC []
// ET DANS LES [] ON AJOUTE LES VALEURS SEPAREES AVEC UNE VIRGULE

// TABLEAU ORDONNE
$tableauNombre  = [ 3, 6, 22, 10 ];
$tableauTexte   = [ "a", "b", "c" ];
$tableauMelange = [ 10, "john", "marseille", 22 , false];

// SI ON VEUT ACCEDER A UNE VALEUR DANS LE TABLEAU
// ON PASSE PAR SON INDICE
// ATTENTION: LA PREMIERE VALEUR A POUR INDICE 0
// LA 2E VALEUR A POUR INDICE 1
// etc...

$nombre1 = $tableauNombre[0];       // 3
$texte3  = $tableauTexte[2];        // "c"
$prenom  = $tableauMelange[1];       // "john" 

// AUTRE ECRITURE EN PHP
$tableauNombre = array( 3, 6, 22, 10);

// TABLEAU VIDE
// ON PEUT CREER UN TABLEAU VIDE
$tableau = [];

// ET AJOUTER DES ELEMENTS PAR LA SUITE
// RACCOURCI AVEC PHP POUR AJOUTER UN NOUVEL A LA FIN DU TABLEAU
$tableau[] = "a";   // $tableau = [ "a" ];
$tableau[] = "b";   // $tableau = [ "a", "b" ];
$tableau[] = "c";   // $tableau = [ "a", "b", "c" ];

// SI ON VEUT REMPLACER UNE VALEUR DANS LE TABLEAU
// ON UTILISE [] EN PRECISANT L'INDICE (AVANT LE = )
$tableau[1] = "d";  // $tableau = [ "a", "d", "c" ];


?>
```

## TABLEAUX ASSOCIATIFS

    ON RANGE DES PAIRES (CLE, VALEUR)
    LES CLES DOIVENT ETRE UNIQUES 
    
    (ON NE DOIT PAS AVOIR 2 FOIS LA MEME CLE DANS LE TABLEAU ASSOCIATIF)

```php
<?php

$tableauAssociatif = [ 
    "cle1" => "valeur1", 
    "cle2" => "valeur2",
    "cle3" => "valeur3" 
    ];

// SI ON VEUT ACCEDER A UNE VALEUR
// ON VA UTILISER SA CLE

$element2 = $tableauAssociatif["cle2"];


?>
```

    PAUSE JUSQU'A 11H20...

    



























































