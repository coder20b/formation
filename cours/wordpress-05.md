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

    mardi 15/12

https://prod.liveshare.vsengsaas.visualstudio.com/join?A2352DEE1EA166797457EB061A0A58CCB355

## Questions ??

## the_permalink 


    POUR AJOUTER UN LIEN VERS LA PAGE OU L'ARTICLE
    https://developer.wordpress.org/reference/functions/the_permalink/

    ET SI ON VEUT AFFICHER LES CATEGORIES DE L'ARTICLE
    https://developer.wordpress.org/reference/functions/the_category/

```php
    <section>

<?php while (have_posts()) : the_post(); ?>
    
    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
    <p><?php the_category() ?></p>
    <p><?php the_content() ?></p>
    <?php the_post_thumbnail() ?>

<?php endwhile; ?>

    </section>
```

## ASTUCE POUR LES MOTS DE PASSE

    MOT DE PASSE A ENTRER
    tHeK86rZnvi0#o9LCO

    MOT DE PASSE HASHE
    $P$BS/g4VmpLod6xdtLISC5C6Mzug2oNn.


## BOUCLES MULTIPLES

    POUR COMPOSER UNE PAGE AVEC DES ARTICLES

    https://codex.wordpress.org/fr:La_Boucle

    Classe WP_Query
    TRES IMPORTANT DANS WORDPRESS 
    => MOTEUR DE RECHERCHE DES CONTENUS
    =>TRES RICHE EN POSSIBILITES

    https://developer.wordpress.org/reference/classes/wp_query/


```php

<section class="colx3">
    <h3>ARTICLES DANS LA CATEGORIE jeux-video</h3>

<?php $my_query = new WP_Query('category_name=jeux-video'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

    <article>
        <h3><?php the_title() ?></h3>
        <p><?php the_content() ?></p>
        <?php the_post_thumbnail(); ?>
    </article>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

</section>

```

## CHAMPS PERSONNALISES (CUSTOM FIELDS)

    ON PEUT ENRICHIR NOTRE PROJET AVEC DES INFOS SUPPLEMENTAIRES

    https://developer.wordpress.org/reference/functions/post_custom/

    ET ENSUITE LE THEME PEUT AFFICHER CES INFORMATIONS AVEC LA FONCTION 
    post_custom

```php

<section class="colx3">
    <h3>ARTICLES DANS LA CATEGORIE jeux-video</h3>

<?php $my_query = new WP_Query('category_name=jeux-video'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

    <article>
        <h3><?php the_title() ?></h3>
        <strong>prix: <?php echo post_custom("prix") ?> euros</strong>
        <p>éditeur: <?php echo post_custom("editeur") ?></p>
        <p><?php the_content() ?></p>
        <?php the_post_thumbnail(); ?>
    </article>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

</section>

```

    PAUSE ET REPRISE A 11H15

## EXTENSION ACF (Advanced Custom Fields)

    POUR GERER LES CHAMPS PERSONNALISES AVEC UNE MEILLEURE UX...

    VERSION GRATUITE ET VERSION PAYANTE PLUS AVANCEE
    
    https://wordpress.org/plugins/advanced-custom-fields/

    https://www.advancedcustomfields.com/

    ACF AJOUT ENCORE PLUS DE FONCTIONS UTILES
    the_field POUR AFFICHER UN CHAMP PERSONNALISE

    https://www.advancedcustomfields.com/resources/

    https://www.advancedcustomfields.com/resources/the_field/

    TUTO EN FRANCAIS...
    https://wpformation.com/advanced-custom-fields-wordpress/

```php


<section class="colx3">
    <h3>ARTICLES DANS LA CATEGORIE mode</h3>

<?php $my_query = new WP_Query('category_name=mode'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

    <article>
        <?php the_post_thumbnail(); ?>
        <h3><?php the_title() ?></h3>
        <h3><?php the_field('collection') ?></h3>
        <!-- affichage avec la fonction WP mais ne gère pas les listes -->
        <!--<h3><?php echo post_custom('collection') ?></h3>-->
    </article>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

</section>

```

## CUSTOM POST TYPES

    POUR CREER DES NOUVEAUX TYPES DE CONTENUS AVEC WP...

    https://fr.wordpress.org/plugins/custom-post-type-ui/

    ON PEUT SEPARER DES CONTENUS DANS LA PARTIE ADMIN
    ET ENSUITE LES AFFICHER AVEC UNE BOUCLE MULTIPLE

```php

<section class="colx3">
    <h3>CONTENUS DE TYPE jeux-videos</h3>

<?php $my_query = new WP_Query('post_type=jeux-videos'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

    <article>
        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
        <p><?php the_content() ?></p>
        <?php the_post_thumbnail(); ?>
    </article>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

</section>    

```


## THEMES ENFANTS

    SCENARIO 1:     BIEN SI ON VEUT CODER TOUT SON THEME (HTML, CSS, JS, etc...)
    INSTALLATION WORDPRESS
    + CREER MON THEME DE ZERO

    SCENARIO 2: 
    INSTALLATION WORDPRESS
    + ACTIVER UN THEME PAYANT OU GRATUIT (CODE PAR UN AUTRE DEV...)
    + AJOUTER LE CODE MANQUANT AVEC UN THEME ENFANT

    SI ON MODIFIE LE CODE DU THEME PARENT
    => ON VA PERDRE NOS MODIFS SI IL Y A UNE MISE A JOUR
    => ON PEUT SEPARER NOS MODIFS DANS UN THEME ENFANT

## CREER UN THEME ENFANT

    CREER UN NOUVEAU DOSSIER montheme-enfant
    wp-content/themes/montheme-enfant
    
    ET ENSUITE CREER LE FICHIER style.css
    wp-content/themes/montheme-enfant/style.css

    ET AJOUTER UNE ANNOTATION AU DEBUT DU FICHIER style.css
    => IL FAIT DONNER LE NOM DU DOSSIER DU THEME PARENT

    COOL ON A UN THEME ENFANT ET ON PEUT L'ACTIVER
    => LE SITE CONTINUE DE FONCTIONNER ;-p

    => AVANTAGE: ON VA POUVOIR RANGER NOTRE CODE DANS LE DOSSIER DU THEME ENFANT
    => EN CAS DE MISE A JOUR DU THEME PARENT, JE NE VAIS PAS PERDRE MON CODE

    ATTENTION AUX LIMITES:
    EN CAS DE MODIFICATION DU THEME PARENT
    => VERIFIER QUE NOTRE CODE EST TOUJOURS SYNCHRONISE AVEC LES MODIFICATIONS DU THEME PARENT
    => ASSEZ FASTIDIEUX CAR A LA MAIN...

    ON VA COPIER LES FICHIERS DU THEME PARENT QU'ON VEUT MODIFIER
    => ET ON VA MODIFIER LE CODE DANS LE FICHIER COPIE DANS LE THEME ENFANT
    => WORDPRESS VA AUTOMATIQUEMENT UTILISER LE FICHIER DU THEME ENFANT

    EXCEPTION:
    LE FICHIER style.css DU THEME ENFANT 
    N'EST PAS FORCEMENT UTILISE A LA PLACE DE CELUI PARENT
    (NOTE: ON POURRAIT CODE LE THEME PARENT DE MANIERE A POUVOIR REMPLACER LE FICHIER style.css)


```css
/*
    Template:     montheme

    ANNOTATION
    => COMMENTAIRE POUR CSS
    => MAIS CODE ACTIF POUR WORDPRESS
    => IL FAUT DONNER LE NOM DU DOSSIER DU THEME PARENT
    https://developer.wordpress.org/themes/advanced-topics/child-themes/

  
*/
```

    => PRATIQUE POUR MODIFIER LE HTML

    PAUSE DEJEUNER ET REPRISE 13H50

## MODIFIER LE CSS DU THEME PARENT

    AJOUTER DU CODE CSS DANS Personnaliser > CSS additionnel
    => LE CODE CSS EST INTEGRE DANS UNE BALISE style DANS head SUR TOUTES LES PAGES

    ON PEUT AJOUTER SON FICHIER CSS OU JS EN PLUS AVEC LE THEME ENFANT
    => ON PASSE PAR LES HOOKS (CROCHETS)
    => wp_head ET wp_footer

    https://developer.wordpress.org/plugins/hooks/

    => TRES IMPORTANT DANS WP POUR LES DEVELOPPEURS

```php
<?php

// WORDPRESS VA CHARGER LES 2 FICHIERS functions.php

// FONCTION DE CALLBACK QUE WP VA APPELER
function ajouterCss ()
{
    // https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/
    // URL JUSQU'AU DOSSIER DU THEME ENFANT
    $stylesheet_dir_uri = get_stylesheet_directory_uri();

    echo 
    <<<x
    <link rel="stylesheet" href="$stylesheet_dir_uri/style.css">

    x;
}

// => HOOKS (CROCHETS)
// => ACCROCHER DU CODE EN PLUS DANS LA MECANIQUE DE WORDPRESS
// COMME UN EVENT LISTENER, WP VA APPELER LA FONCTION ajouterCss AU MOMENT DE wp_head
add_action("wp_head", "ajouterCss");

function ajouterJs ()
{
    // https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/
    // URL JUSQU'AU DOSSIER DU THEME ENFANT
    $stylesheet_dir_uri = get_stylesheet_directory_uri();

    echo 
    <<<x
    <script src="$stylesheet_dir_uri/script-enfant.js"></script>

    x;

}
add_action("wp_footer", "ajouterJs");

```

## FILTRES ET CROCHETS (FILTERS AND HOOKS)

    ON PEUT AJOUTER SON FICHIER CSS OU JS EN PLUS AVEC LE THEME ENFANT
    => ON PASSE PAR LES HOOKS (CROCHETS)
    => wp_head ET wp_footer

    https://developer.wordpress.org/plugins/hooks/

    https://developer.wordpress.org/reference/functions/add_action/

    https://developer.wordpress.org/reference/functions/add_filter/

    => TRES IMPORTANT DANS WP POUR LES DEVELOPPEURS
    => IL Y A DES CENTAINES DE CROCHETS DISPONIBLES
    => RALENTIT CAR IL EST A L'ECOUTE DES EVENEMENTS
    => MAIS CA RAJOUTE ENORMEMENT DE FLEXIBILITE

```php
<?php

// ON PEUT AJOUTER UN FILTRE POUR MODIFIER LE CONTENU
function filtrerContenu ($contenuActuel)
{
    // AJOUTER DU CODE AVANT OU APRES
    $contenuFiltre = "(AVANT)($contenuActuel)(APRES)";
    
    // CHANGER LE CODE ET REMPLACER AVEC AUTRE CHOSE
    $contenuFiltre = str_replace("FUCK", "F***", $contenuFiltre);

    // EXTRAIRE LE DEBUT MAIS CACHER LE RESTE POUR LE RESERVER AUX ABONNES
    $extrait = substr(strip_tags($contenuFiltre), 0, 10);
    $contenuFiltre = $extrait . "(suite réservé aux abonnés...)";

    return $contenuFiltre;
}
add_filter("the_content", "filtrerContenu");

```

## SHORTCODE

    REPOSE SUR LES FILTRES DE WORDPRESS...

    ON VA POUVOIR UNE BALISE "SHORTCODE"
    [ma-carte]

    SERA REMPLACE PAR LE CODE HTML DE LA CARTE

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.94542225665!2d5.362326016339136!3d43.29446462913523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0c6a1843729%3A0x7d3f3acf189dc3b1!2sVieux-Port%20de%20Marseille!5e0!3m2!1sfr!2sfr!4v1607951106128!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

```php

// ON VA PROPOSER UN SHORTCODE [ma-carte]
// QUI VA AFFICHER UNE CARTE GOOGLE MAPS
// https://developer.wordpress.org/reference/functions/add_shortcode/
// https://codex.wordpress.org/Shortcode_API
function afficherCarte ()
{
    return 
    <<<x
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.94542225665!2d5.362326016339136!3d43.29446462913523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0c6a1843729%3A0x7d3f3acf189dc3b1!2sVieux-Port%20de%20Marseille!5e0!3m2!1sfr!2sfr!4v1607951106128!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    x;
}

add_shortcode("ma-carte", "afficherCarte");

```

## HIERARCHIE DES TEMPLATES

    https://codex.wordpress.org/fr:Hi%C3%A9rarchie_des_fichiers_mod%C3%A8les

    https://developer.wordpress.org/themes/basics/template-hierarchy/

    https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png

    DANS WORDPRESS, LES TEMPLATES ONT DES PRIORITES DIFFERENTES
    ET WP SUIT UN ARBRE DE DECISION POUR SELECTIONNER LE FICHIER A UTILISER POUR AFFICHER UNE PAGE

    EN PRATIQUE: ON COMMENCE PAR LA DROITE DE L'ARBRE 
    => ON CREE index.php QUI EST LE TEMPLATE PAR DEFAUT
    => ET ENSUITE ON CREE DES TEMPLATES SUPPLEMENTAIRES POUR CERTAINES PAGES

    LES THEMES ENFANTS PEUVENT CREER DES TEMPLATES SUPPLEMENTAIRES


## CREER UNE EXTENSION

    CREER UN DOSSIER DANS LE DOSSIER plugins
    wp-content/plugins/monplugin/

    ET AJOUTER UN FICHIER index.php
    wp-content/plugins/monplugin/index.php

    ET AJOUTER UNE ANNOTATION POUR DONNER LE NOM DE L'EXTENSION
    => COOL, ON A UNE EXTENSION QU'ON PEUT ACTIVER

```php
<?php
/*
    Plugin Name: MON JOLI PLUGIN
*/
```

    DANS UNE EXTENSION, ON PEUT AJOUTER DU CODE QUI POURRA ETRE REUTILISE SUR PLUSIEURS PROJETS
    (SHORTCODES, etc...)


## AUTONOMIE

    REVOIR UN PEU AU CALME TOUT CA (WORDPRESS DEVELOPPEUR)
    POSER DES QUESTIONS...
    * AUTRES ACTIVITES ?

    => EN INDIVIDUEL

    => EN EQUIPE
    CONTINUER A AVANCER SUR LES PROJETS EN EQUIPE

## OUTILS AGILES DE GESTION DE PROJET


    * POUR GERER LE PROJET EN EQUIPE

    https://clickup.com/

    https://www.figma.com/

    * POUR GERER LE CODE DU PROJET EN EQUIPE

    https://github.com/



    PAUSE ET REPRISE A 16H05...


    FIN DE JOURNEE 





