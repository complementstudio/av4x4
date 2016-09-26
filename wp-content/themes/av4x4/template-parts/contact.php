<?php
/**
 * Template Name: Contact Us
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

get_header(); ?>

    <div id="main-content" class="main-content">


        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
                <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php
                        // Page thumbnail and title.
                        the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
                        ?>

                        <div class="entry-content">
                            <?php
                            the_content();
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) );

                            edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
                            ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->


                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                endwhile;
                ?>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->

<?php
get_footer();
