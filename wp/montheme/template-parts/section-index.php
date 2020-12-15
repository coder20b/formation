
    <section>

<?php while (have_posts()) : the_post(); ?>
    
    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
    <p><?php the_category() ?></p>
    <p><?php the_content() ?></p>
    <?php the_post_thumbnail() ?>

<?php endwhile; ?>

    </section>
