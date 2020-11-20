# formation

Formation Dev Fullstack

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    vendredi 20/11

https://prod.liveshare.vsengsaas.visualstudio.com/join?014DC9BF64B5BA2835AF5F3F5F7F411770D1

## questions ?

## RESUME DE L'EPISODE PRECEDENT

    PHP COMME LANGAGE DE PROGRAMMATION
    VARIABLES
    VALEURS
        texte
        nombres
        booleens
        tableaux ordonnés (indices 0,1,2,...)
        tableaux associatifs (paires cle1/valeur1, cle2/valeur2, etc...)
    STRUCTURES DE CONTROLE: CONDITION if...else...
    STRUCTURES DE CONTROLE: BOUCLES while, for, foreach

    TABLEAUX ET BOUCLES: BONNE COMBINAISON

## FORMULAIRES

    PROTOCOLE HTTPS
    Hyper
    Text
    Transfer
    Protocol
    Securized

    HyperText => HTML
    Transfer Protocol => COMMENT ON COMMUNIQUE ENTRE LE NAVIGATEUR ET LE SERVEUR WEB

    DANS LE NAVIGATEUR, ON ENTRE DES URLS
    https://monsite.fr/

    => LE NAVIGATEUR DEMANDE A COMMUNIQUER AVEC LE SERVEUR monsite.fr EN HTTPS

    https://developer.mozilla.org/fr/docs/Web/HTTP/M%C3%A9thode

    GET     => MODE PAR DEFAUT  => LECTURE
    POST    => MODE POUR ENVOYER DES INFORMATIONS A STOCKER => ECRITURE

    LES AUTRES MODES NE SONT PAS UTILISES DANS LE NAVIGATEUR...
    PUT
    DELETE
    HEAD
    ...


```php

        <a href="url-destination.php">cliquez ici</a>

        <form action="url-destinataire.php" method="GET">
            <input name="nom">
            <button type="submit">envoyer le formulaire</a>
        </form>

```

    method      GET ou POST
    action      URL DESTINATAIRE QUI RECEVRA LES INFOS REMPLIES DANS LE FORMULAIRE

    SI ON A method="GET"
    LES INFOS SONT ENVOYEES DANS L'URL (A LA FIN)
    ?nom=saisie-visiteur

    => LIMITE DE QUELQUES Ko
    => COMME LES URLS SONT VISIBLES DANS LA BARRE D'ADRESSE DU NAVIGATEUR
        => EVITER LES INFOS CONFIDENTIELLES (MOT DE PASSE, NUMERO DE CB, etc...)
        => LES URLS GET SONT GARDEES DANS L'HISTORIQUE DU NAVIGATEUR

    SI GET NE CONVIENT PAS, ALORS ON VA method="POST"

    EN GENERAL, ON UTILISE POST
    ET DE TEMPS EN TEMPS C'EST PRATIQUE DE FAIRE DU GET

    SI ON A method="POST"
    => ON VA POUVOIR ENVOYER PLUSIEURS Go D'INFOS
    => SI ON A BESOIN DE FAIRE DES UPLOADS... COOL.
    LE BON COTE, LES INFOS ENVOYEES N'APPARAISSENT PAS DANS L'URL

## EN PHP, ON RECOIT LES INFOS DANS $_GET, $_POST ET $_REQUEST

    SUIVANT LE FORMULAIRE HTML, ON RECEVRA LES INFOS DANS DES TABLEAUX ASSOCIATIFS DIFFERENTS

```php
<?php

// DEBUG
// print_r VA AFFICHER LE CONTENU D'UN TABLEAU
// $_GET $_POST $_REQUEST SONT DES TABLEAUX ASSOCIATIFS QUI SONT CREES PAR PHP
// ET QUI SONT REMPLIS PAR PHP AUSSI

echo "<h3>TABLEAU GET</h3>";
print_r($_GET);

echo "<h3>TABLEAU POST</h3>";
print_r($_POST);

echo "<h3>TABLEAU REQUEST</h3>";
print_r($_REQUEST);


?>
```

    PAUSE ET REPRISE A 11H05

## ENVOYER UN MAIL EN PHP

    https://www.php.net/manual/fr/function.mail.php

## CREER UN FICHIER

    // https://www.php.net/manual/fr/function.file-put-contents
    file_put_contents("php/contact.txt", $mail, FILE_APPEND);

## DANGER DES FORMULAIRE

    SE MEFIER DE CE QUE ON RECOIT DE L'EXTERIEUR...
    => DEBUT DE PARANOIA AVEC PHP...
    => SE POSER PLEIN DE QUESTIONS DE SECURITE :-/

    SI ON VEUT PROTEGER UN DOSSIER AVEC APACHE
    https://httpd.apache.org/docs/2.4/fr/howto/access.html

    => AJOUTER UN FICHIER .htaccess
            ET AJOUTER LA LIGNE
            Require all denied

```
# PARAMETRAGE POUR APACHE
# FICHIER .htaccess

# IL FAUT BLOQUER L'ACCES A CE DOSSIER
Require all denied
```

## MISE EN LIGNE SUR IONOS

    AVEC EXTENSION WP FILE MANAGER

    https://long-hai.procoder.fr/projet-vitrine/


## TESTER LES PERFORMANCES DES PAGES EN LIGNE

    https://web.dev/measure/

    OBJECTIF: ETRE AU DESSUS DE 90%... 

## EXERCICE EN AUTONOMIE


    REVENIR SUR LE PROJET ONE PAGE
    ET AJOUTER UNE SECTION AVEC UNE GALERIE (PHP ET JS)
    ET AJOUTER UNE SECTION AVEC UN FORMULAIRE DE CONTACT (PHP)

    PAUSE DEJEUNER ET REPRISE A 13H50... 

































































