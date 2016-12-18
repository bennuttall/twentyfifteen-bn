<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php twentyfifteen_post_thumbnail(); ?>

                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>

                    <div class="me-elsewhere">
                        <ul class="grid">
                            <li class="rpi"><a href="https://www.raspberrypi.org/">Raspberry Pi</a></li>
                            <li class="github"><a href="https://github.com/bennuttall">GitHub</a></li>
                            <li class="twitter"><a href="https://twitter.com/ben_nuttall">Twitter</a></li>
                            <li class="flickr"><a href="http://www.flickr.com/photos/ben_nuttall/">Flickr</a></li>
                        </ul>
                    </div>

                    <div class="latest-posts">
                        <h2>Latest blog posts</h2>

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

                        <?php endwhile; wp_reset_postdata(); ?>

                        <p class="more"><a href="/blog/">See more</a></p>
                    </div>

                    <div class="latest-other">

                        <h2>Latest from the Raspberry Pi blog</h2>

                        <?php $raspberrypi = get_field('raspberrypi_posts'); ?>

                        <ul>
                        <?php foreach ($raspberrypi as $post): ?>
                            <li><a href="<?php echo $post['url']; ?>"><?php echo $post['title']; ?></a></li>
                        <?php endforeach; ?>
                        </ul>

                        <p class="more"><a href="https://www.raspberrypi.org/blog/author/bennuttall/">See more</a></p>

                        <h2>Latest from opensource.com</h2>

                        <?php $opensource = get_field('opensource_posts'); ?>

                        <ul>
                        <?php foreach ($opensource as $post): ?>
                            <li><a href="<?php echo $post['url']; ?>"><?php echo $post['title']; ?></a></li>
                        <?php endforeach; ?>
                        </ul>

                        <p class="more"><a href="https://opensource.com/users/bennuttall">See more</a></p>
                    </div>
                </div>

                <?php edit_post_link(__('Edit', 'twentyfifteen'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->'); ?>

            </article>

        </main>
    </div>

<?php get_footer();
