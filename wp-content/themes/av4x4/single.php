<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */

get_header(); ?>
	<div class="home_content clearfix">

		<div class="meet_team_page">
			<div class="meet_team_page">
				<div class="clearfix view_pakages_section">
					<div style="width: 100%">
						<div>
							<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
                                 * Include the post format-specific template for the content. If you want to
                                 * use this in a child theme, then include a file called called content-___.php
                                 * (where ___ is the post format) and that will be used instead.
                                 */
								get_template_part( 'content', get_post_format() );



							endwhile;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php

get_footer();
