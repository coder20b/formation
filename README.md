# formation

Formation Dev Fullstack (Front + Back)

Stack = Pile
=> Pile des technologies mises en oeuvre sur un projet
=> HTML, CSS, JS, PHP, SQL  => FullStack
=> HTML + CSS + JS          => Front
=> PHP + SQL                => Back

## github

Repository Github:

https://github.com/coder20b/formation

## liveshare

    mercredi 02/12

https://prod.liveshare.vsengsaas.visualstudio.com/join?D18E612B18F432AA7656F5F7CF7CFE3A2425

## Questions ?

## RESUME EPISODE PRECEDENT


    SQL
    Create
    Update
    Delete
    Read        => LE GROS DU TRAVAIL EN SQL
                => LE PLUS PUISSANT AVEC SQL
                        (MOTEUR DE RECHERCHE MULTICRITERES PRODUITS...)

    EN PHP, ON CREE NOTRE BIBLIOTHEQUE DE FONCTIONS
    => Model DANS LE MVC
    DBAL
    DataBase
    Access / Abstraction
    Layer

    => EN FRANCAIS: COUCHE D'ACCESS/ABSTRACTION A LA BASE DE DONNEES
    => LE DEVELOPPEUR APPLICATIF (PHP POUR NOUS...)
            NE DEVRAIT CONNAITRE LA PARTIE SQL
    => ON DEVRAIT CACHER LE CODE SQL AU DEVELOPPEUR PHP
            (EN REALITE, ON N'Y ARRIVE PAS...)


    ON A COMMENCE A AJOUTER DU CODE ORIENTE OBJET
    => ON A CREE UNE CLASSE Model
    => PROPRIETE static POUR N'AVOIR QU'UNE SEULE CONNEXION A MySQL


## EXPRESSIONS REGULIERES (REGEXP)

    OUTIL DE TRAITEMENT DE TEXTE
    ANCIEN ET PUISSANT
    MAIS CRYPTIQUE A LIRE...

    UTILE POUR FILTRER DU TEXTE ET ENLEVER LES CARACTERES INTERDITS...

```php
function filtrerCamelCase ($name)
{
    $nom = filtrer($name);
    // EN PLUS ON RAJOUTE UN FILTRE SUPPLEMENTAIRE
    // POUR NE GARDER QUE LES LETTRES (minuscules ou MAJUSCULES) ET LES CHIFFRES
    // https://www.php.net/manual/fr/function.preg-replace.php
    // https://regex101.com/
    $nom = preg_replace("/[^a-zA-Z0-9]/", "", $nom);
    return $nom;
}

```

    PAUSE ET REPRISE A 11H15

## ACTIVITES

    * AUTONOMIE CRUD AVEC NOUVELLE VERSION (MOINS DE FICHIERS PHP + DE CODE JS)
    * COURS: UPLOAD DE FICHIER
    * COURS PROJET BLOG: PROTECTION DE LA PARTIE ADMIN

    DEJEUNER ET REPRISE A 14H

    * AUTONOMIE CRUD AVEC NOUVELLE VERSION 
        (MOINS DE FICHIERS PHP + DE CODE JS)
        SUR TABLES SQL
        newsletter
        contact
        article

    * SI VOUS AVEZ DES QUESTIONS N'HESITEZ PAS A LES POSER...

    PAUSE A 15H45 ET REPRISE A 16H.
    AUTONOMIE POUR LE RESTE DE LA JOURNEE.

    * SI VOUS AVEZ DES QUESTIONS N'HESITEZ PAS A LES POSER...

















