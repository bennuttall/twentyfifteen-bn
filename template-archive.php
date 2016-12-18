<?php /*
    Template name: Blog Archive
*/

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php while (have_posts()): the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php twentyfifteen_post_thumbnail(); ?>

                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="entry-content">
                    <?php the_content();

                    $args = array(
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                    );

                    $posts = new WP_Query($args);

                    $archive = array();

                    while ($posts->have_posts()) {
                        $posts->the_post();

                        $date = get_the_date('Y-m-d');
                        $year = substr($date, 0, 4);
                        $month = substr($date, 5, 2);

                        $archive[$year][$month][] = array('title' => get_the_title(), 'link' => get_permalink(get_the_ID()));

                    }

                    ?>

                    <ul class="archive">

                    <?php

                    foreach ($archive as $year => $months) {
                        echo "<li><h2><a href='/{$year}/'>{$year}</a></h2><ul>";
                        foreach ($months as $month => $posts) {
                            echo "<li><h3><a href='/{$year}/{$month}/'>" . monthname($month) . "</h3><ul>";
                            foreach ($posts as $post) {
                                echo "<li><a href='{$post['link']}'>{$post['title']}</a></li>";
                            }
                            echo "</ul></li>";
                        }
                        echo "</ul></li>";
                    }

                    ?>

                    </ul>

                </div>

                <?php edit_post_link(__('Edit', 'twentyfifteen'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->'); ?>

            </article>

        <?php endwhile; ?>

        </main>
    </div>

<?php get_footer();
