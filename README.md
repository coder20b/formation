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

    AUTONOMIE POUR LE FORMULAIRE DE CONTACT...

    ET ENSUITE: COMME EXERCICE
    CREER UNE ENTITE Newsletter
        nom                 string
        email               string
        dateInscription     datetime

    LANCER TOUTES LES COMMANDES POUR CREER LE CRUD
    ET ENSUITE AJOUTER LE CODE POUR AVOIR LE FORMULAIRE SUR LA PAGE D'ACCUEIL...

    GESTION DES UTILISATEURS... ENTITE User
    => GERE A PART AVEC SYMFONY
    => ... ON AJOUTERA CETTE PARTIE A PART ...

    AUTRES IDEES D'ENTITE...

    * Article
        titre           string
        url             string
        image           string
        contenu         text
        categorie       string
        datePublication datetime


    ASTUCE: POUR LES PROJETS EN EQUIPE
        COMMENCER A REDIGER UN DOCUMENT SUR LE DEROULE DU PROJET
        => AIDE POUR LES SUPPORTS DE SOUTENANCE...

    PAUSE DEJEUNER ET REPRISE A 13H45...

    QUESTIONS ??

## ACTIVITES POUR CET APRES-MIDI ??

    * AJOUTER LA GESTION DES UTILISATEURS AVEC SYMFONY
    * AUTONOMIE SUR LE make:crud
    * ??

    ARTICLE BLOG SUR make:crud
    https://symfony.com/blog/new-and-improved-generators-for-makerbundle

    DOC POUR LA GESTION DES UTILISATEURS (LOGIN => SECURITY...)
    https://symfony.com/doc/current/security.html

## ENTITE User

    https://symfony.com/doc/current/security.html#a-create-your-user-class

    php bin/console make:user

    The name of the security user class (e.g. User) [User]:
    >

    Do you want to store user data in the database (via Doctrine)? (yes/no) [yes]:
    >

    Enter a property name that will be the unique "display" name for the user (e.g. email, username, uuid) [email]:
    > 

    Will this app need to hash/check user passwords? Choose No if passwords are not needed or will be checked/hashed by some other system (e.g. a single sign-on server).

    Does this app need to hash/check user passwords? (yes/no) [yes]:
    >

    created: src/Entity/User.php
    created: src/Repository/UserRepository.php
    updated: src/Entity/User.php
    updated: config/packages/security.yaml


    Success!


    Next Steps:
    - Review your new App\Entity\User class.
    - Use make:entity to add more fields to your User entity and then run make:migration.
    - Create a way to authenticate! See https://symfony.com/doc/current/security.html


    ET ENSUITE, ON FAIT LES MEMES ETAPES QUE POUR UNE ENTITE
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate

    ...

## GESTION DU LOGIN

    https://symfony.com/doc/current/security/form_login_setup.html

    php bin/console make:auth


    What style of authentication do you want? [Empty authenticator]:
    [0] Empty authenticator
    [1] Login form authenticator
    > 1
    1

    The class name of the authenticator to create (e.g. AppCustomAuthenticator):
    > LoginFormAuthenticator

    Choose a name for the controller class (e.g. SecurityController) [SecurityController]:
    > SecurityController

    Do you want to generate a '/logout' URL? (yes/no) [yes]:
    > 

    created: src/Security/LoginFormAuthenticator.php
    updated: config/packages/security.yaml
    created: src/Controller/SecurityController.php
    created: templates/security/login.html.twig

            
    Success! 
            

    Next:
    - Customize your new authenticator.
    - Finish the redirect "TODO" in the App\Security\LoginFormAuthenticator::onAuthenticationSuccess() method.
    - Review & adapt the login template: templates/security/login.html.twig.


## FORMULAIRE DE CREATION DE COMPTE

    https://symfony.com/doc/current/doctrine/registration_form.html

    php bin/console make:registration-form

    ATTENTION: PLUS SIMPLE DE REPONDRE no
    POUR L'ENVOI DE MAIL DE CONFIRMATION
    (POUR EVITER LES PROBLEMES AVEC LE BUNDLE SymfonyCasts...)

    Creating a registration form for App\Entity\User

    Do you want to add a @UniqueEntity validation annotation on your User class to make sure duplicate accounts aren't created? (yes/no) [yes]:
    >

    Do you want to send an email to verify the user's email address after registration? (yes/no) [yes]:
    > no 
    => (C'EST PLUS SIMPLE)


    [WARNING] We're missing some important components. Don't forget to install these after you're finished.

            composer require symfonycasts/verify-email-bundle


    What email address will be used to send registration confirmations? e.g. mailer@your-domain.com:
    > contact@monsite.fr

    What "name" should be associated with that email address? e.g. "Acme Mail Bot":
    > mon site

    Do you want to automatically authenticate the user after registration? (yes/no) [yes]:
    >

    updated: src/Entity/User.php
    updated: src/Entity/User.php
    created: src/Security/EmailVerifier.php
    created: templates/registration/confirmation_email.html.twig
    created: src/Form/RegistrationFormType.php
    created: src/Controller/RegistrationController.php
    created: templates/registration/register.html.twig


    Success!


    Next:
    1) Install some missing packages:
        composer require symfonycasts/verify-email-bundle
    2) In RegistrationController::verifyUserEmail():
        * Customize the last redirectToRoute() after a successful email verification.
        * Make sure you're rendering success flash messages or change the $this->addFlash() line.
    3) Review and customize the form, controller, and templates as needed.
    4) Run "php bin/console make:migration" to generate a migration for the newly added User::isVerified property.

    Then open your browser, go to "/register" and enjoy your new form!


    CONFIG DES EMAILS... DESACTIVATION DANS .env
    https://symfony.com/doc/current/mailer.html#disabling-delivery

    ###> symfony/mailer ###
    # MAILER_DSN=smtp://localhost
    MAILER_DSN=null://null
    ###< symfony/mailer ###


## ACTIVATION DE LA PROTECTION DE LA PARTIE ADMIN

    MODIFIER LE FICHIER config/packages/security.yaml
    => ON DEMANDE LE ROLE_ADMIN POUR ACCEDER AUX PAGES DONT L'URL COMMENCE PAR /admin


    # Easy way to control access for large sections of your site
    # Note: Only the *first* access control that matches will be used
    access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }
        - { path: ^/membre, roles: ROLE_MEMBRE }
        # - { path: ^/admin, roles: ROLE_ADMIN }
        # - { path: ^/profile, roles: ROLE_USER }


    ET MAINTENANT, IL FAUT DONNER LES BONS ROLES AUX Users
    => COLONNE roles
    => AJOUTER LE ROLE_ADMIN POUR LES ADMINS

    [ "ROLE_ADMIN" ]


## ACTIVITE POUR LE RESTE DE LA JOURNEE

    AUTONOMIE POUR LE RESTE DE LA JOURNEE

    * INDIVIDUEL
        make:crud
        make:user
        make:auth
        make:registration-form
        ET CONFIG SECURITE

    * EQUIPE PROJET
        FAIRE UN ETAT DES LIEUX PAR RAPPORT A LA BASE QUE SYMFONY PROPOSE...
        ET LES 3 SEMAINES DE DEV EN EQUIPE...

    * git AVEC symfony EN EQUIPE...

    * ???

## GIT LES BASES

    GIT OUTIL DE GESTION DE VERSION...
    
    => INDIVIDUEL: 
            PERMET DE FAIRE DES SAUVEGARDES DE SON CODE REGULIEREMENT
    => TRAVAIL EN EQUIPE:
            PERMET DE SYNCHRONISER LE CODE DE PLUSIEURS DEVELOPPEURS
            CODE DU PROJET 
            => REUNIFICATION DU CODE DE TOUS LES DEV...
            => GIT VA AIDER A SYNCHRONISER LES CODES


    PROGRAMME A INSTALLER SUR SON ORDI...
    POUR VERIFIER, OUVRIR UN TERMINAL...

    git --version

## INSTALLATION DE GIT-SCM


    https://git-scm.com/

    TELECHARGER LE PROGRAMME D'INSTALLATION (WINDDOWS...)
    https://git-scm.com/download/win

    INSTALLER GIT-SCM...
    CHOISIR VSCODE COMME EDITEUR (PAS LA VERSION INSIDERS)

    ET ENSUITE REDEMARRER VSCODE

    ET RETESTER DANS LE TERMINAL
    git --version


    ET ENSUITE SE CREER UN COMPTE SUR LE SITE
    github.com


    PAUSE ET REPRISE A 16H...

    https://github.com/
    => RACHETE PAR MICROSOFT
    
    CREER UN COMPTE ET SE CONNECTER
    EXEMPLE:
    https://github.com/coder20b/

    VSCODE
    => DEVELOPPEMENT GERE PAR MICROSOFT
    => GIT INTEGRE


    CLONER LE REPOSITORY SUR SON ORDINATEUR
    DANS LE TERMINAL (DANS LE DOSSIER htdocs/)

    git clone https://github.com/coder20b/test1.git

    Cloning into 'test1'...
    remote: Enumerating objects: 3, done.
    remote: Counting objects: 100% (3/3), done.
    remote: Total 3 (delta 0), reused 0 (delta 0), pack-reused 0
    Unpacking objects: 100% (3/3), done.


    COMMIT  => SAUVEGARDE SUR SON ORDI
    PUSH    => ENVOI DE MES SAUVEGARDES SUR GITHUB.COM

## TRAVAIL EN EQUIPE AVEC GIT


    FIN DE JOURNEE ET BONNE SOIREE...
    
    

    






























