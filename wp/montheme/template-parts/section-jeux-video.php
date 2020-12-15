
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