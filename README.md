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


    NOTE: EN JS, ON N'A PAS DE TABLEAU ASSOCIATIF CAR ON PEUT UTILISER LES OBJETS

```php
<?php

$tableauAssociatif = [ 
    "cle1" => "valeur1", 
    "cle2" => "valeur2",
    "cle3" => "valeur3" 
    ];

// SI ON VEUT ACCEDER A UNE VALEUR
// ON VA UTILISER SA CLE
// LECTURE
$element2 = $tableauAssociatif["cle2"];

// ECRITURE
// SI ON VEUT CHANGER LA VALEUR ASSOCIEE A UNE CLE
$tableauAssociatif["cle3"] = "nouvelle valeur";

// tableaux de tableaux
$tableauA = [ "c1" => "v1", "c2" => "v2" ];
$tableau = [
    "cle1"  => [ "a", "b", "c" ],
    "cle2"  => [ "cleA" => "a", "cleB" => "b", "cleC" => "c" ]
    "cle3"  => $tableauA 
    ];


?>
```

    PAUSE JUSQU'A 11H20...


## STRUCTURES DE CONTROLE: CONDITIONS

    IF... ELSE

    TRES UTILE CAR CA PERMET DE RENDRE LE PROGRAMME INTELLIGENT ;-p

    ON VA FAIRE UN TEST
    SUIVANT LE RESULTAT DU TEST (true OU false)
    ON VA EXECUTER UNE BRANCHE DU CODE OU L'AUTRE
    => PERMET DE FAIRE UN CHOIX


```php
<?php

// SUIVANT LE RESULTAT DU TEST PHP EXECUTE SEULEMENT UN DES 2 SCENARIOS
if ($test)
{
    // SCENARIO $test == true
    // ...
}
else
{
    // OPTIONNEL
    // SCENARIO $test == false
    // ...
}


if ($test)
{
    // SCENARIO $test == true
    // ...
}


// ON PEUT ENCHAINER PLUSIEURS TEST
if ($test)
{
    // SCENARIO $test == true
    // ...
}
else if ($test2)
{
    // SCENARIO $test1 == false ET $test2 == true
    // ...
}
else
{
    // OPTIONNEL
    // SCENARIO PAR DEFAUT
    // ...
}

switch ($test)
{
    case "a":
        // SCENARIO $test == "a"
        break;
    case "b":
        // SCENARIO $test == "b"
        break;
    case "c":
        // SCENARIO $test == "c"
        break;
    default:
        // SCENARIO PAR DEFAUT
}


?>
```    






## STRUCTURES DE CONTROLE: BOUCLES

    FOR
    WHILE
    DO... WHILE
    FOREACH


    TRES UTILE POUR REPETER PLUSIEURS FOIS UN MEME BLOC DE CODE
    => UTILISE TOUTE LA PUISSANCE DES PROCESSEURS

```php    
<?php


$compteur = 0;              // VALEUR DE DEPART
while ($compteur < 100)     // TEST D'ARRET
{
    // TANT QUE LE TEST $compteur < 100 EST VRAI
    // REPETER LE BLOC DE CODE
    // ...
    // ...
    echo "<h1>LE COMPTEUR VAUT $compteur</h1>";

    // INCREMENTER LE COMPTEUR
    // PIEGE: NE PAS OUBLIER SINON BOUCLE INFINIE
    $compteur++;            // INCREMENTATION
}

// ECRITURE PLUS COMPACTE
for ($compteur = 0; $compteur < 100; $compteur++)
{
    // TANT QUE LE TEST $compteur < 100 EST VRAI
    // REPETER LE BLOC DE CODE
    // ...
    // ...
    echo "<h1>LE COMPTEUR VAUT $compteur</h1>";
}


?>
``` 


## TABLEAUX ET BOUCLES

    PHP PROPOSE UNE ECRITURE ENCORE PLUS SIMPLE
    SI ON VEUT COMBINER UN TABLEAU ET UNE BOUCLE

    ASTUCE: POUR COMPTER LE NOMBRE D'ELEMENTS
    ON PEUT UTILISER LA FONCTION count
    https://www.php.net/manual/fr/function.count.php

    SI ON VEUT PARCOURIR TOUS LES ELEMENTS D'UN TABLEAU (DU PREMIER AU DERNIER)
    PHP PROPOSE foreach QUI EST LE PLUS SIMPLE POUR FAIRE UNE BOUCLE

    https://www.php.net/manual/fr/control-structures.foreach.php


```php 
<?php

$tableau = [ "a", "b", "c" ];
// TABLEAU ORDONNE A DES INDICES 0, 1, 2

// AVEC UNE BOUCLE, ON PEUT INCREMENTER UN COMPTEUR ET L'UTILISER COMME INDICE
$compteur = 0;
while ($compteur < count($tableau))
{
    echo "<h1>le compteur vaut $compteur</h1>";     // 0, 1, 2
    $element = $tableau[$compteur];
    echo "<h1>la valeur est $element</h1>";

    $compteur++;
}

echo "<hr>";
for ($compteur = 0; $compteur < count($tableau); $compteur++)
{
    echo "<h1>le compteur vaut $compteur</h1>";     // 0, 1, 2
    $element = $tableau[$compteur];
    echo "<h1>la valeur est $element</h1>";

}

echo "<hr>";
foreach ($tableau as $compteur => $element)
{
    echo "<h1>le compteur vaut $compteur</h1>";     // 0, 1, 2
    echo "<h1>la valeur est $element</h1>";

}

?>
``` 


    COOL. foreach FONCTIONNE AUSSI SUR UN TABLEAU ASSOCIATIF

```php 
<?php

$tableauAssociatif = [
    "cle1" => "valeur1",
    "cle2" => "valeur2",
    "cle3" => "valeur3",
];

foreach ($tableauAssociatif as $cle => $valeur)
{
    echo "<h1>la clé vaut $cle</h1>";     // "cle1", "cle2", "cle3"
    echo "<h1>la valeur est $valeur</h1>";

}

?>
``` 


































































