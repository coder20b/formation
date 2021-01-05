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

    mardi 05/01
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?4592AE9E471CC0747D2E9DE29C8C16EED2DF

## Questions ??

## RESUME DE L'EPISODE PRECEDENT

### JOINTURES ENTRE TABLES SQL

    https://sql.sh/cours/jointures


    PLEIN DE POSSIBILITES DE COMBINAISON ENTRE TABLES SQL
    EN PRATIQUE: ON UTILISE SURTOUT 2 TYPES DE JOINTURES
    * INNER JOIN
    https://sql.sh/cours/jointures/inner-join
    * LEFT JOIN
    https://sql.sh/cours/jointures/left-join

```sql

-- inner join

SELECT *
FROM table1
INNER JOIN table2 ON table1.id = table2.fk_id


-- left join

SELECT *
FROM utilisateur
LEFT JOIN commande ON utilisateur.id = commande.utilisateur_id

```

    RELATIONS ENTRE TABLES SQL
    ONE TO ONE          => 1 COLONNE DE CLE ETRANGERE
    ONE TO MANY         => 1 COLONNE DE CLE ETRANGERE
                        => JOINTURE ENTRE 2 TABLES

    MANY TO MANY        => 2 COLONNES DE CLE ETRANGERES
                        => 3 TABLES SQL
                        => JOINTURE ENTRE 3 TABLES SQL
```sql

-- exemple avec left join

-- one to many
-- une jointure left join

SELECT *
FROM utilisateur
LEFT JOIN commande ON utilisateur.id = commande.utilisateur_id

-- many to many
-- 2 jointures sur 3 tables sql

SELECT *
FROM utilisateur
LEFT JOIN article_utilisateur ON utilisateur.id = article_utilisateur.utilisateur_id
LEFT JOIN article ON article.id = article_utilisateur.article_id

-- note on pourrait faire la même chose avec inner join
-- les résultats seront plus restreints
-- ...

```

### MODEL DANS SYMFONY

    ENTITE  => Classes PHP
    ORM     => Object Relationship Mapping
    PHP                             SQL
        Classe                          Table
            Propriétés d'objet              Colonnes
                Objets                          Lignes

    OUTILS EN LIGNE DE COMMANDE POUR CREER DES ENTITES
    ET ENSUITE GENERER LES TABLES SQL A PARTIR DES ENTITES
    => IMPORTANT DE BIEN CREER SES ENTITES
    => CODE CENTRAL ET BEAUCOUP DE CODE GENERE A PARTIR DES ENTITES

    * SETUP INITIAL POUR SE CONNECTER AVEC LA DATABASE
    FICHIER .env
    => MODIFIER LA LIGNE AVEC LES BONNES INFOS DE CONNEXION

    DATABASE_URL="mysql://root:@localhost:3306/symfony?serverVersion=mariadb-10.4.11"


    * POUR CHAQUE ENTITE...

    php bin/console make:entity
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate
    php bin/console make:crud

    => VISION GENERALE DU MVC AVEC SYMFONY

## EXEMPLE AVEC LE FORMULAIRE DE CONTACT

    CREER UNE ENTITE Contact
        nom                 string
        email               string
        message             text
        dateMessage         datetime


    UNE FOIS LE make:crud FINI
    ON OBTIENT UNE CLASSE CONTROLLER ContactController
    => AVANT LA CLASSE ON A UNE ANNOTATION DE ROUTE
     * @Route("/contact")

    => TOUTES LES ROUTES AURONT /contact COMME PREFIXE

    => URL POUR LA ROUTE contact_index
    http://localhost:8888/symfony/public/contact/

    => URL POUR LA ROUTE contact_new
    http://localhost:8888/symfony/public/contact/new

    ...

    => ON NE VA PAS GARDER CES URLS ;-p
    => ON VA AJOUTER COMME PREFIXE /admin/contact
    => ON POUSSE TOUTES LES PAGES DE CRUD DANS UNE PARTIE /admin/ DU SITE
    => (PREPARATION POUR SECURISER LA PARTIE ADMIN...)

```php


/**
 * @Route("/admin/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact_index", methods={"GET"})
     */
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('contact/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

    // ...
}

```


    REMARQUE:
    LA COMMANDE make:crud GENERE UN CRUD 
    ...SUR PLUSIEURS PAGES
    => PAS DANS LA DERNIERE TENDANCE (SPA Single Page Application)
    => PAS EN AJAX...
    => UN PEU VIEUX EN UX...

    PAUSE ET REPRISE A 11H05...



































