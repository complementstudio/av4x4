<?php

	echo '<div class="sidebar sidebar-homepage-b">';

		// Homepage Sidebar B
		if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Homepage Sidebar 2') );	else st_sidebar_dummy( 'h3', 'Homepage Sidebar 2' );

	echo '</div>';

?>