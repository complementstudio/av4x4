<?php
/**
 * The template for displaying Homepage team section
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
?>
<?php if ( function_exists( 'get_field' ) ) : ?>

    <?php

    $team_title         = get_field( 'team_title', $page_id );
    $team_description   = get_field( 'team_description', $page_id );
    $team_button_text   = get_field( 'team_button_text', $page_id );
    $team_content       = get_field( 'team_content', $page_id );
    ?>
    <div class="crew_section">
        <div class="wrapper">
            <div class="meet_crew_block">
                <h2> <?=$team_title?> </h2>
                <?=$team_description?>
                <a href="javascript:void(0)" class="meet_crew_btn"><?=$team_button_text?></a>
            </div>
            <?=$team_content?>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/images/crew_img.png" alt="crew image">
        <div class="black_overlay"></div>
    </div>
<?php endif; ?>