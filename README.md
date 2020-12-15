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
    => EN CAS DE MISE A JOUR DU THEME PARENT, JE NE VAIS PERDRE MON CODE

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
    => IL FAIT DONNER LE NOM DU DOSSIER DU THEME PARENT
    https://developer.wordpress.org/themes/advanced-topics/child-themes/

  
*/
```

    PAUSE DEJEUNER ET REPRISE 13H50


    
## SHORTCODE

## CREER UNE EXTENSION

## FILTRES ET CROCHETS (FILTERS AND HOOKS)









