<?php

$args = array(
    'posts_per_page' => 4,
);

$latest = new WP_Query($args);

while ($latest->have_posts()): $latest->the_post(); ?>

    <div class="post">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <div class="featured-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
        </div>

        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>
    </div>

<?php endwhile;
