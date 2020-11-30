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
    => POUR EXAMEN, IL FAUT SAVOIR
    * CREER UNE DATABASE ET UNE TABLE SQL
    * CODER UN CRUD
    * UPLOAD DE FICHIER


## ADMIN: CRUD SUR LA TABLE SQL article

    PAUSE ET REPRISE A 11H15

    * CREATE SUR LA TABLE SQL article

    * READ
        SCENARIO 3: READ DANS LA PARTIE ADMIN SUR LA TABLE article
        => ON CREE UNE FONCTION QU'ON VA POUVOIR REUTILISER SUR LES AUTRES TABLES SQL

    * DELETE    => PLUS FACILE

    * UPDATE    => PLUS DIFFICILE   
                => CONSEIL: GARDER POUR LA FIN
                    (MIX ENTRE CREATE ET DELETE)

    PAUSE DEJEUNER ET REPRISE 13H45



## SUPPRIMER EN JS

    QUAND L'ADMIN CLIQUE SUR LE BOUTON EN FIN DE LIGNER "SUPPRIMER 13"
    IL FAUT COPIER L'id (ex: 13) DANS LE CHAMP DU FORMULAIRE DE DELETE
    ET IL FAUT DECLENCHER LE CLICK SUR LE BOUTON DU FORMULAIRE.


    EN HTML5, ON PEUT AJOUTER DES ATTRIBUTS PERSO AUX BALISES
    ET POUR PASSER LE VALIDATEUR, IL SUFFIT DE COMMENCER LE NOM DE L'ATTRIBUT PAR data-...

## UPDATE EN JS

    PLUSIEURS TECHNIQUES POSSIBLES
    * attributs HTML data-
    * class sur balises td
    * JSON en JS
    * dupliquer les formulaires pour chaque ligne
    * ...

    LE PLUS SIMPLE EST DE DUPLIQUER POUR CHAQUE LIGNE UN FORMULAIRE D'UPDATE
    ET DE PRE-REMPLIR CE FORMULAIRE
    POUR CHAQUE LIGNE, ON PEUT CACHER LE FORMULAIRE 
        ET CREER UN BOUTON QUI VA AFFICHER/CACHER LE FORMULAIRE

    C'EST SUR CETTE PAGE CRUD QUE LES TECHNIQUES JS ONT BEAUCOUP EVOLUE EN QUELQUES ANNEES
    => BEAUCOUP D'AJAX ET DE FRAMEWORKS FRONT ONT ETE CREE POUR AIDER LES DEVS...

## AUTONOMIE POUR L'APRES MIDI

    * AJOUTER LA PAGE CRUD admin.php POUR LA TABLE SQL article
    * AJOUTER LA PAGE CRUD admin-newsletter.php POUR LA TABLE SQL newsletter
    * AJOUTER LA PAGE CRUD admin-contact.php POUR LA TABLE contact
    * ...

    UX:
    * ON PEUT CREER UN MENU ADMIN DANS LE FOOTER POUR NAVIGUER ENTRE LES PAGES

    PAUSE ET REPRISE A 16H...

































