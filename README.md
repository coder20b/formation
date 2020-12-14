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

    lundi 14/12
    
https://prod.liveshare.vsengsaas.visualstudio.com/join?BA06A7D550C010BE9340916658D84BC26728

## Questions ??

## WordPress Développeurs

    Télécharger WordPress

https://fr.wordpress.org/download/

https://fr.wordpress.org/latest-fr_FR.zip

    Dézipper le fichier .zip
    Et ensuite pour éviter les conflits avec le premier dossier wordpress
    renommer le dossier en wordpress2 et copier le dossier wordpress2 dans htdocs/

    ET ENSUITE CREER AVEC PHPMYADMIN LA DATABASE wordpress2 (AVEC LE CHARSET utf8mb4_general_ci)

    ET ENSUITE LANCER L'INSTALLATION DANS LE NAVIGATEUR 
    http://localhost:8888/wordpress2/

    REMPLIR LES FORMULAIRES
    ET BIEN NOTER LES INFOS DE CONNEXION...

    long-hai
    tHeK86rZnvi0#o9LCO

    SI TOUT SE PASSE BIEN, ON ARRIVE SUR LA PAGE DU TABLEAU DE BORD UNE FOIS CONNECTE...


    ON VA CREER QUELQUES PAGES (CREER LE MENU AVEC LES PAGES VIDES...)
    Accueil
    Galerie
    Blog
    Contact

    REGLAGES DES PARAMETRES...


## DOCUMENTATION OFFICIELLE

    * DOC GENERALE
    https://codex.wordpress.org/

    * DOC PLUS TECHNIQUE
    https://developer.wordpress.org/


    DOSSIERS
    TOUTE LA PARTIE EST DANS LE DOSSIER wp-admin/

    * URL DU TABLEAU DE BORD
    http://localhost:8888/wordpress2/wp-admin/

    * LISTE DES PAGES
    http://localhost:8888/wordpress2/wp-admin/edit.php?post_type=page

    * LISTE DES ARTICLES
    http://localhost:8888/wordpress2/wp-admin/edit.php

    ...

    AJOUTER UN PEU DE CONTENU SUR LES PAGES accueil, galerie et contact
    (titre, contenu et image...)

    PAUSE ET REPRISE A 11H05

## MVC DANS WORDPRESS

    wp-admin/   => ECRANS ADMIN (BACK-OFFICE)   
                => MODEL+CONTROLLER (FORMULAIRES CRUD)

    wp-content/ => DOSSIERS POUR VOTRE SITE

    wp-content/themes   
                => VIEW
                => COMME ON PEUT INSTALLER PLUSIEURS THEMES
                => CHAQUE THEME A SON SOUS-DOSSIER

                => SI ON A LES COMPETENCES DEVELOPPEURS
                => COMBINAISON TRES PUISSANTE
                => UTILISER LE BACK-OFFICE DE WORDPRESS (Model+Controller)
                => CODER LA PARTIE View EN CREANT SON THEME DE ZERO

## CREER SON THEME DE ZERO AVEC WORDPRESS


    https://codex.wordpress.org/Theme_Development

    ET AUSSI SUR INTERNET...
    https://www.grafikart.fr/tutoriels/creer-theme-wordpress-79


    POUR DEMARRER
    CREER UN NOUVEAU SOUS-DOSSIER
    wp-content/themes/montheme

    => DANS LA PARTIE ADMIN
    http://localhost:8888/wordpress2/wp-admin/themes.php
    => WORDPRESS DETECTE LE DOSSIER montheme
    => MAIS CONSIDERE QUE LE THEME EST INCOMPLET

    CREER UN FICHIER style.css (VIDE POUR LE MOMENT)
    wp-content/themes/montheme/style.css

    => THEME EST TOUJOURS INCOMPLET

    AJOUTER UN FICHIER index.php (VIDE POUR LE MOMENT)
    wp-content/themes/montheme/index.php

    => CA Y'EST ON A CREE UN THEME WORDPRESS 
    (BON IL SERT A RIEN IL EST VIDE...)


    REMARQUE INTERESSANTE ET PUISSANTE:
    WORDPRESS LAISSE AU THEME LE CONTROLE POUR LE CODE HTML
    => PLEIN DE LIBERTES ;-p

## CODER UNE PAGE AVEC SON THEME

    AJOUTER LE CODE HTML DANS index.php

    REMARQUE: WORDPRESS GARDE LE CODE HTML TEL QUEL ;-p

## AJOUTER wp_head ET wp_footer

    ON COMMENCE A UTILISER WORDPRESS COMME FRAMEWORK
    => ON RANGE NOTRE CODE DANS DES DOSSIERS ET DES FICHIERS BIEN PRECIS
        ET ON APPELLE DES FONCTIONS FOURNIES PAR WORDPRESS

    https://developer.wordpress.org/reference/functions/wp_head/

    https://developer.wordpress.org/reference/functions/wp_footer/


## AJOUTER DU CSS ET DU JS ET DES IMAGES SUR LE HTML

    https://developer.wordpress.org/reference/functions/get_template_directory_uri/

    CREE L'URL JUSQU'AU DOSSIER montheme
    * PRATIQUE POUR AJOUTER DU CSS, JS ET IMAGES, etc...

    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">

    <img src="<?php echo get_template_directory_uri() ?>/assets/img/article1.jpg" alt="">

    <script src="<?php echo get_template_directory_uri() ?>/assets/js/script.js"></script>


## AJOUTER UN MENU

    PLUSIEURS ETAPES
    CREER UN FICHIER functions.php
    ET AJOUTER LE CODE POUR DECLARER LES ZONES DE MENUS
    // https://developer.wordpress.org/reference/functions/register_nav_menus/
    
    ET ENSUITE DANS index.php
    AFFICHER LES MENUS
    https://developer.wordpress.org/reference/functions/wp_nav_menu/


    * DANS LE FICHIER functions.php

```php
<?php

// DECLARER LES MENUS QUE MON THEME PROPOSE
$tabAssoMenu = [
    "primary" => "MENU PRINCIPAL",
    "footer"  => "MENU PIED DE PAGE",
];
// https://developer.wordpress.org/reference/functions/register_nav_menus/
register_nav_menus($tabAssoMenu);

```

    DANS LE FICHIER index.php

```php

    <header>
        <div>mon site WordPress</div>
        <nav>
            <?php wp_nav_menu([ "theme_location" => "primary"]); ?>
        </nav>
    </header>

    <footer>
        <p>tous droits réservés</p>
        <nav>
            <?php wp_nav_menu([ "theme_location" => "footer"]); ?>
        </nav>
    </footer>

```

## AFFICHER LE CONTENU DE CHAQUE PAGE

    POUR PÖUVOIR ASSOCIER UNE IMAGE A LA UNE EN PLUS DU TITRE ET DU CONTENU
    => AJOUTER CETTE LIGNE DANS functions.php
    https://developer.wordpress.org/reference/functions/add_theme_support/

```php

// POUR AVOIR LES IMAGES A LA UNE...
add_theme_support( 'post-thumbnails' );

```


    BOUCLE WORDPRESS
    => POUR AFFICHER LES CONTENUS CREES DANS LA PARTIE ADMIN

    https://codex.wordpress.org/fr:La_Boucle

    https://developer.wordpress.org/reference/functions/have_posts/

    https://developer.wordpress.org/reference/functions/the_post/

    https://developer.wordpress.org/reference/functions/the_title/

    https://developer.wordpress.org/reference/functions/the_content/

    https://developer.wordpress.org/reference/functions/the_post_thumbnail/

```php

<?php while (have_posts()) : the_post(); ?>
    
    <h1><?php the_title() ?></h1>
    <p><?php the_content() ?></p>
    <?php the_post_thumbnail() ?>
    
<?php endwhile; ?>

```


    PAUSE DEJEUNER ET REPRISE A 13H50...
