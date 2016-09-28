<?php
/**
 * Template Name: Custom Reviews
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

get_header();
$reviews = get_posts(array(
    'post_type' => 'custom_reviews'
));
?>

    <div class="home_content clearfix">
        <div class="customer_review_page">
            <div class="wrapper">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="review_title">
                    <h2><?=the_title();?></h2>
                    <?=the_content();?>
                </div>
                <?php endwhile; ?>
                <?php if(!empty($reviews)) : ?>
                    <?php foreach($reviews as $review) : ?>
                    <?php setup_postdata($review);?>
                    <div class="review_block">
                        <span class="review_quote"><i class="ion-quote"></i></span>
                        <p class="review_text">
                            <?=$review->post_content?>
                        </p>
                        <p class="customer_name">— <?=$review->post_title?></p>
                        <p class="last_row"><?=$review->post_excerpt?></p>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
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
