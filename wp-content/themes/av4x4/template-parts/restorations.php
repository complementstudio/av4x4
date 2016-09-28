<?php
/**
 * Template Name: Restorations
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

get_header();

$services = get_posts(array(
    'post_type' => 'services',
    'post_status' => 'publish',
    'suppress_filters' => false,
    'posts_per_page' => 6,
));
?>

    <div class="home_content clearfix">
        <div class="restorations_page">
            <div class="wrapper">
                <div class="clearfix">
                    <div class="restoration_details clearfix">

                        <?php while ( have_posts() ) : the_post(); ?>
                            <h2 class="section_title"> <?=the_title();?></h2>
                            <div class="img_block" style="background-image: url(<?=the_post_thumbnail_url( 'full' )?>)">

                            </div>
                            <div class="text_content">
                                <?=the_content();?>
                            </div>
                        <?php endwhile; ?>

                    </div>
                    <div class="recent_restorations_title">
                        <h2> RECENT 4x4 RESTORATIONS</h2>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Proin non est ac lorem ornare ultrices eu a tortor. Aliquam et pretium risus. Donec ut cursus magna, sed consectetur quam.
                        </p>
                    </div>

                    <?php if(!empty($services)) : ?>
                        <?php foreach($services as $service) : ?>
                            <?php
                                setup_postdata($service);

                                $team_title         = get_field( 'team_title', $page_id );
                                $team_description   = get_field( 'team_description', $page_id );
                                $team_button_text   = get_field( 'team_button_text', $page_id );
                                $team_content       = get_field( 'team_content', $page_id );

                            ?>
                            <div class="text_small_blocks clearfix" style="background-image: url(<?=the_post_thumbnail_url( 'full' )?>)">
                                <a href="<?=$service->guid?>" class="text_content">
                                    <h2><?=$service->post_title?></h2>
                                    <p><?=$service->post_excerpt?></p>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php echo do_shortcode("[feedback]"); ?>
        <div class="slider_section clearfix">
            <div class="wrapper">
                <div class="clearfix header_section">
                    <h2>THE GARAGE</h2>
                    <p>There are always incredible projects going on at AV4x4. We build some of the most amazing 4x4's available anywhere. Check it out! </p>
                </div>
                <?php
                get_template_part( 'page-modules/garage_slider' );?>

            </div>
        </div>
    </div>

<?php
get_footer();

