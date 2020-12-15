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

## CHAMPS PERSONNALISES (POST CUSTOM)

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

    