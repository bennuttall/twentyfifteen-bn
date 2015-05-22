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
                            <li class="rpi"><a href="http://www.raspberrypi.org/">Raspberry Pi</a></li>
                            <li class="github"><a href="https://github.com/bennuttall">GitHub</a></li>
                            <li class="twitter"><a href="https://twitter.com/ben_nuttall">Twitter</a></li>
                            <li class="flickr"><a href="http://www.flickr.com/photos/ben_nuttall/">Flickr</a></li>
                        </ul>
                    </div>

                    <div class="latest-posts">
                        <h2>Latest blog posts</h2>

                        <?php get_template_part('part', 'blog-latest'); ?>

                        <p class="more"><a href="/blog/">See more</a></p>
                    </div>
                </div>

                <?php edit_post_link(__('Edit', 'twentyfifteen'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->'); ?>

            </article>

        </main>
    </div>

<?php get_footer();
