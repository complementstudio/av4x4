<?php
/**
 * Template Name: HomePage
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
get_header();
$page_id = get_the_ID();

$our_posts = get_posts(
    array( 'showposts' => -1,
        'post_type' => 'services',
        'post_status' => 'publish',
        'suppress_filters' => false,
        'posts_per_page' => 24,
        'cat' =>  3,
    )
);

$other_posts = get_posts(
    array( 'showposts' => -1,
        'post_type' => 'services',
        'category__not_in' =>  3,
        'posts_per_page' => 24,

    )
);

$k=0;
$other_posts1=[];
$other_posts2=[];
$other_posts3=[];
 foreach($other_posts as $post){
     if($k ==0 ) array_push($other_posts1,$post);
     if($k ==1 ) array_push($other_posts2,$post);
     if($k ==2 ) array_push($other_posts3,$post);
         $k++;
         $k%=3;
 }


?>

    <div class="home_content clearfix">
        <div class="wrapper">
            <h2 class="home_title"> OUR SERVICES</h2>
            <div class="text_block clearfix">
                <p>
                    Here at American Vintage 4x4, we specialize in off road accessories, 4x4 packages, full restorations,
                    custom design and fabrication and everything in between. Whether your 4x4 is OLD or NEW, we do it all! But we don't just sell parts. We help you select
                    the right parts and accessories that will work together with all of the other components on your 4x4. We are System Integration Specialists.
                </p>
            </div>
            <?php if(!empty($our_posts)) : ?>
            <div class="clearfix">
                <?php foreach($our_posts as $post) : ?>
                    <?php
                        setup_postdata($post);
                        get_template_part('page-modules/services-items');
                    ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="clearfix other_service_block">
                <h2 class="home_small_title"> SOME OTHER SERVICES WE OFFER FOR YOUR 4X4 </h2>
                <ul class="list-unstyled list-inline main_list">
                    <li class="list_item">
                        <ul class="list-unstyled text-center">
                            <?php foreach($other_posts1 as $post) : ?>
                                <li><a href="<?=$post->guid?>">    <?=$post->post_title?> </a></li>
                            <?php endforeach; ?>

                        </ul>
                    </li>
                    <li class="list_item">
                        <ul class="list-unstyled text-center">
                            <?php foreach($other_posts2 as $post) : ?>
                                <li><a href="<?=$post->guid?>">    <?=$post->post_title?> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li >
                    <li class="list_item">
                        <ul class="list-unstyled text-center">
                            <?php foreach($other_posts3 as $post) : ?>
                                <li><a href="<?=$post->guid?>">    <?=$post->post_title?> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <?php get_template_part( 'page-modules/homepage_team_section' );?>
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

        <?php echo do_shortcode("[feedback]"); ?>
        <?php get_template_part( 'page-modules/recent_work_section' );?>

    </div>


<?php

get_footer();
