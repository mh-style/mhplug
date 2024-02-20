<?php get_header(); ?>

<main id="main-content" role="main">
    <?php
    while ( have_posts() ) : the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header"><?php
    $hide_page_title = get_post_meta(get_the_ID(), '_hide_page_title', true);
    if ('on' !== $hide_page_title) {
        the_title('<h1 class="entry-title">', '</h1>');
    }

    // Page content

?>
            </header>

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'your-theme-textdomain' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>
        </article>
        <?php
        // If comments are open or there is at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
