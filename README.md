# formation

Formation Dev Fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    lundi 30/11
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?4F1A8154FBD84AA3E1FC367B14C062B3E127

## Questions ?

    // pointeur ou référence
    $b = & $a;

    $texte = "a";
    $texte2 = $texte;

    echo $texte2;       // "a"
    $texte = "b";
    echo $texte;        // "b"
    echo $texte2;       // "a"

    $texte3 = & $texte;
    echo $texte3;       // "b"
    $texte = "c";
    echo $texte;        // "c"
    echo $texte3;       // "c"


## Résumé de la semaine précédente

    PHP x SQL
    Formation   => COOL ON A LES 5 LANGAGES HTML, CSS, JS, PHP, SQL
    Technique   => On peut créer des sites avec autant de pages qu'on veut
        
    Template PHP x Table SQL
    article.php?id=1        => POUR GOOGLE C'EST UNE PREMIERE PAGE
    article.php?id=2        => POUR GOOGLE C'EST UNE DEUXIEME PAGE
    ...

    Principe de Instagram, Le Bon Coin, Airbnb, etc...

## LANGAGE SQL

    Pour chaque table SQL, on a au minimum 1 CRUD

    Create      => AJOUTER UNE LIGNE DANS UNE TABLE

    Read        => AFFICHER LES INFORMATIONS STOCKEE DANS UNE TABLE
                => SCENARIO 1: PAGE blog.php ON AFFICHE LA LISTE DE ARTICLES
                => SCENARIO 2: Page article.php ON AFFICHE UN SEUL ARTICLE
    Update
    Delete

    CETTE SEMAINE, IL FAUT FINIR AU MOINS UN CRUD...
    POUR LA SEMAINE PROCHAINE, LE JEUDI 10 EXAMEN PHP+SQL INTERMEDIAIRE
    => POUR EXAMEN, IL FAUT
    * SAVOIR CODER UN CRUD
    * UPLOAD DE FICHIER


## ADMIN: CRUD SUR LA TABLE SQL article

    PAUSE ET REPRISE A 11H15

    * CREATE SUR LA TABLE SQL article
    * READ
        SCENARIO 3: READ DANS LA PARTIE ADMIN SUR LA TABLE article
        => ON CREE UNE FONCTION QU'ON VA POUVOIR REUTILISER SUR LES AUTRES TABLES SQL
    * DELETE    => PLUS FACILE
    * UPDATE    => PLUS DIFFICILE   => CONSEIL: GARDER POUR LA FIN



















