
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