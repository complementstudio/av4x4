<?php
/**
 * Template Name: Meet_team
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
    'cat' =>  3,
));

$teams = get_posts(array(
    'post_type' => 'av4x4_team'
));
?>

    <div class="home_content clearfix">
        <div class="meet_team_page">
            <div class="top_reasons_section clearfix">
                <div class="wrapper">
                    <h2> TOP REASONS TO WORK WITH AMERICAN VINTAGE 4x4</h2>
                    <div class="reasons_block">
                        <div class="img_block" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/services/Bumpers&RollCages1.jpg')"></div>
                        <p> Lorem ipsum dolor sit</p>
                    </div>
                    <div class="reasons_block">
                        <div class="img_block" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/services/Bumpers&RollCages1.jpg')"></div>
                        <p> Lorem ipsum dolor sit</p>
                    </div>
                    <div class="reasons_block">
                        <div class="img_block" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/services/Bumpers&RollCages1.jpg')"></div>
                        <p> Lorem ipsum dolor sit</p>
                    </div>
                    <div class="reasons_block">
                        <div class="img_block" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/services/Bumpers&RollCages1.jpg')"></div>
                        <p> Lorem ipsum dolor sit</p>
                    </div>
                </div>
            </div>
            <!--<div class="meet_team_page">-->
            <?php echo do_shortcode("[sc name='Team']"); ?>
            <!--</div>-->
            <!--<div class="meet_team_page">-->
            <div class="wrapper">
                <div class="clearfix">
                    <div class="crew_title">
                        <h2> THE CREW</h2>
                        <p> We’re the toughest crew you’ve ever seen.  We know Jeep’s & 4x4’s like the back of our hands.
                            You’ll want our 20 years plus experience to be working on your rig.
                        </p>
                    </div>


                    <?php if(!empty($teams)) : ?>
                        <?php foreach($teams as $team) : ?>
                            <?php
                                setup_postdata($team);
                                $image_id = get_post_thumbnail_id($team->ID);
                                $image_url = wp_get_attachment_image_src($image_id,'full', true);
                                $image_url_thumb = wp_get_attachment_image_src($image_id,'high', true);
                                $position = get_field( 'position', $team->ID);
                                $about = get_field( 'about', $team->ID);
                                $current_car = get_field( 'current_car', $team->ID);
                                $favoriute = get_field( 'favoriute', $team->ID);
                            ?>

                            <div class="text_small_blocks clearfix" style="background-image: url(<?=$image_url_thumb[0]?>)">
                                <a href="javascript:void(0)" class="text_content">
                                    <h2><?=$team->post_title?></h2>
                                    <h3><?=$position?></h3>
                                    <p><?=$about?></p>
                                    <ul class="list-unstyled">
                                        <li>Current <?=$current_car?></li>
                                        <li>Favorite <?=$favoriute?></li>
                                    </ul>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
            <!--</div>-->

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

