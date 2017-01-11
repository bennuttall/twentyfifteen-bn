<?php /*
    Template name: Talks
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
                    <?php the_content(); ?>

                    <h2>Past</h2>

                    <ul class="talks">

                    <?php $args = array(
                        'child_of' => get_the_ID(),
                        'sort_column' => 'post_date',
                        'sort_order' => 'desc',
                    );
                    $posts = get_pages($args);

                    foreach ($posts as $post):
                        setup_postdata($post)?>

                        <h3><?php the_title(); ?></h3>
                        <?php $talks = array_reverse(get_field('talks'));

                        foreach ($talks as $talk): ?>

                        <li>
                            <h4><?php echo $talk['title']; ?></h4>
                            <?php echo $talk['event']; ?><br />
                            <?php echo $talk['location']; ?><br />
                            <?php echo $talk['date']; ?><br />

                            <?php $slides = $talk['slides_url'] ? "<a href='{$talk['slides_url']}'>slides</a>" : null;
                            $video = $talk['video_url'] ? "<a href='{$talk['video_url']}'>video</a>" : null;

                            if ($slides && $video):
                                echo "{$slides} | {$video}";
                            elseif ($slides):
                                echo $slides;
                            elseif ($video):
                                echo $video;
                            endif; ?>
                        </li>

                    <?php endforeach;
                    endforeach; ?>

                    </ul>

                </div>

                <?php edit_post_link(__('Edit', 'twentyfifteen'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->'); ?>

            </article>

        <?php endwhile; ?>

        </main>
    </div>

<?php get_footer();
