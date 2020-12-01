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

    mardi 01/12
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?7206E20815AF8DB0100C6AC762B45E393B16

## Questions ?

    Surveiller le nombre de fichiers
    Et équilibrer avec le travail en équipe pour que chaque dév puisse travailler sur ses fichiers.
    (sans marcher sur les pieds du voisin...)


## Résumé épisode précédent

    CRUD sur la table article
    => BEAUCOUP D'INTERACTION UTILISATEURS EN UNE SEULE PAGE
    => Progressive Web App
    => SPA Single Page Application
    => Angular, React, Vue
    => ON PEUT CONCURRENCER LES APPLICATIONS MOBILES
    => UNE SEULE TECHNO WEB POUR LES 3 PLATEFORMES (Web, Android et iOS...)
    => Application Web ou Hybrides

    => Applications Natives
    => Android  => Java, Kotlin         => WebView
    => iOS      => ObjectiveC, Swift    => WebView


## SQL

    CRUD
    ASTUCE: UTILISER PHPMYADMIN POUR DEBUGGER DU CODE SQL


### Create

    https://sql.sh/cours/insert-into

```sql    

-- ligne de commentaire

-- pour insérer une ligne (99% des cas...)

INSERT INTO article
(titre, image, contenu, datePublication)
VALUES
('mon titre', 'url image', 'le contenu', '2020-12-01 10:00:00');

-- pour insérer plusieurs lignes (plus rare...)

INSERT INTO `newsletter` (`id`, `nom`, `email`, `dateInscription`) 
VALUES
(1, 'test1146', 'test1146@me', '2020-11-25 11:46:07'),
(2, 'test1148', 'test1148@me', '2020-11-25 11:48:47'),
(3, 'test1206', 'test1206@me', '2020-11-25 12:06:28');

```

    => ON CREE UNE FONCTION PHP QUI CREE CE CODE SQL POUR NOUS
    => insererLigne

### Delete

    https://sql.sh/cours/delete

    TRES IMPORTANT: NE PAS OUBLIER LA CLAUSE WHERE
    POUR SELECTIONNER LA BONNE LIGNE A SUPPRIMER

    TECHNIQUEMENT, ON PEUT UTILISER DES SELECTEURS PLUS COMPLIQUES AVEC LA CLAUSE WHERE...

```sql   
-- pour effacer une ligne (99% des cas...)
DELETE FROM article
WHERE id = 123;

```

    => ON CREE UNE FONCTION PHP QUI CREE CE CODE SQL POUR NOUS
    => supprimerLigne

### Update

    https://sql.sh/cours/update

```sql   
-- pour modifier une ligne (99% des cas...)
-- , seulement entre les lignes (pas au début et pas à la fin)
UPDATE article
SET
    titre = 'nouveau titre',
    datePublication = '2020-12-01 10:09:00'
WHERE id = 123;

```

    => ON CREE UNE FONCTION PHP QUI CREE CE CODE SQL POUR NOUS
    => modifierLigne

### Read

    => C'EST LA OU IL FAUT CONNAITRE PLUS DE SQL
    => C'EST SUR L'AFFICHAGE QU'ON A LE PLUS BESOIN DANS LES PROJETS WEB

    https://sql.sh/cours/select

    * TRI SUR UNE OU PLUSIEURS COLONNES
    => TRES UTILISE POUR CREER UN MOTEUR DE RECHERCHE DE PRODUITS
    https://sql.sh/cours/order-by

    PAR DEFAUT CROISSANT    => ASC
    SINON DECROISSANT       => DESC

    ET ON POURRAIT TRIER SUR PLUSIEURS COLONNES
    
```sql   

-- requete de base
-- sélectionne toutes les lignes et toutes les colonnes de la table article 
-- tri par défaut: par id croissant
SELECT * FROM article

-- en réalité, on va trier sur une autre colonne que id
SELECT * FROM article
ORDER BY datePublication DESC

-- en pratique on va filtrer pour ne sélectionner qu'une partie des lignes
SELECT * FROM article
WHERE
    datePublication < '2020-01-12 00:00:00'
ORDER BY 
    datePublication DESC

-- les clauses WHERE sont très puissantes pour filtrer les sélections
SELECT * FROM newsletter 
WHERE 
dateInscription < '2020-11-30 00:00:00'
AND
dateInscription > '2020-11-26 00:00:00'
ORDER BY email DESC, id DESC;


```

### CLAUSES WHERE

    https://sql.sh/cours/where

    https://sql.sh/cours/where/like

    ET TOUT SE COMBINE...
    https://sql.sh/cours/where/and-or

    COMME DES TESTS OU CONDITIONS EN JS ET PHP
    * OPERATEURS DE COMPARAISON
    =       (PIEGE CLASSIQUE EN SQL UN SEUL =)
    <
    >
    <=
    >=
    !=

    ET EN PLUS
    IN      DONNER UNE LISTE DE VALEURS POSSIBLES
    (EN FRONT, QUAND ON A DES CHECKBOX...)

    BETWEEN

    LIKE
    => SUPER PUISSANT POUR EFFECTUER UNE RECHERCHE PAR MOT CLE
    => SQL FAIT TOUT LE BOULOT POUR NOUS ;-p


```sql
SELECT * FROM `newsletter` 
WHERE 
    id IN (10, 15, 20)

SELECT * FROM newsletter 
WHERE 
dateInscription < '2020-11-30 00:00:00'
AND
dateInscription > '2020-11-26 00:00:00'
ORDER BY email DESC, id DESC;

-- attention à l'ordre: min en premier et ensuite le max
SELECT * FROM newsletter 
WHERE 
dateInscription BETWEEN '2020-11-26 00:00:00' AND '2020-11-30 00:00:00'
ORDER BY email DESC, id DESC;

-- recherche par mot clé
-- les emails qui contiennent '5'
-- et les noms qui commencent par 'nom'
SELECT * FROM `newsletter` 
WHERE `email` LIKE '%5%'
AND nom LIKE 'nom%'

-- tout se combine avec des OR ou des AND
SELECT * FROM `newsletter` 
WHERE 
    ( `email` LIKE '%5%' AND nom LIKE 'nom%' )
    OR 
    dateInscription BETWEEN '2020-11-26 00:00:00' AND '2020-11-30 00:00:00'
    OR 
    id IN (10, 15, 20)
ORDER BY 
    email DESC, id DESC;

```

    PAUSE ET REPRISE A 11H15...

## PAGINATION DES REPONSES AVEC SQL

    OFFSET ET LIMIT
    => POUR PAGINER LES REPONSES


```sql

-- seulement les 5 premieres réponses
SELECT * FROM newsletter 
WHERE 
dateInscription BETWEEN '2020-11-26 00:00:00' AND '2020-11-30 00:00:00'
ORDER BY email DESC, id DESC
LIMIT 5
;

-- on affiche 5 éléments par page   (limit 5)
-- et on affiche la première page   (offset 0)
SELECT * FROM newsletter 
WHERE 
dateInscription BETWEEN '2020-11-26 00:00:00' AND '2020-11-30 00:00:00'
ORDER BY email DESC, id DESC
LIMIT 5
OFFSET 0
;

-- on affiche 5 éléments par page   (limit 5)
-- et on affiche la 2è page         (offset 5)
SELECT * FROM newsletter 
WHERE 
dateInscription BETWEEN '2020-11-26 00:00:00' AND '2020-11-30 00:00:00'
ORDER BY email DESC, id DESC
LIMIT 5
OFFSET 5
;

-- on affiche 5 éléments par page   (limit 5)
-- et on affiche la 3è page         (offset 10)
SELECT * FROM newsletter 
WHERE 
dateInscription BETWEEN '2020-11-26 00:00:00' AND '2020-11-30 00:00:00'
ORDER BY email DESC, id DESC
LIMIT 5
OFFSET 10
;

-- page N   offset (N-1) * LIMIT
-- page 1   offset (1-1) * 5 = 0
-- page 2   offset (2-1) * 5 = 5
-- page 3   offset (3-1) * 5 = 10
-- => C'EST PHP QUI FAIT CE CALCUL POUR PRODUIRE LE CODE SQL


-- tout se combine avec des OR ou des AND
SELECT * FROM `newsletter` 
WHERE 
    ( `email` LIKE '%5%' AND nom LIKE 'nom%' )
    OR 
    dateInscription BETWEEN '2020-11-26 00:00:00' AND '2020-11-30 00:00:00'
    OR 
    id IN (10, 15, 20)
ORDER BY 
    email DESC, id DESC
LIMIT 5
OFFSET 5
;
```


    PAUSE ET REPRISE A 14H00


## ACTIVITES APRES-MIDI

    * EXERCICES EN AUTONOMIE
        crud article
        crud newsletter
        crud contact
    
    * NE PAS HESITER A POSER DES QUESTIONS...

    * ECHEANCE SEMAINE PROCHAINE: EXAMEN PHP+SQL

    * CREER UNE DATABASE AVEC PHPMYADMIN
    * CREER UNE TABLE SQL AVEC PHPMYADMIN
    * CODER UNE PAGE CRUD SUR CETTE TABLE SQL
    * GERER UPLOAD DE FICHIER => A FAIRE CETTE SEMAINE


    ASTUCE: POUR AVOIR MOINS DE FICHIERS
    * ON PEUT AMELIORER LE DELETE POUR LE RENDRE GENERAL POUR TOUTES LES TABLES
    * ON PEUT REGROUPER LE CREATE + UPDATE DANS UN SEUL FICHIER POUR CHAQUE TABLE



































