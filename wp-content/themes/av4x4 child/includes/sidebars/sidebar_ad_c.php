<?php

	if ( is_active_sidebar(5) ) { // 5 the ID of Ad Sidebar 3

		echo '<div id="sidebar-ad-c"><div class="sidebar sidebar-ad-c">';
	
			// Sidebar Ad 3
			if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Ad Sidebar 3') );
	
		echo '</div></div>';

	}

?>