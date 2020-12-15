
    <section>

<?php while (have_posts()) : the_post(); ?>

    <article>
        <?php the_post_thumbnail() ?>
        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
        <div><?php the_content() ?></div>
        <p><?php the_category() ?></p>
    </article>

<?php endwhile; ?>

    </section>
