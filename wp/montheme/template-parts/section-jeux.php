
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