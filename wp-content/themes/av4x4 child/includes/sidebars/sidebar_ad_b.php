<?php

	if ( is_active_sidebar(4) ) { // 4 the ID of Ad Sidebar 2

		echo '<div class="sidebar sidebar-ad-b">';
	
			// Sidebar Ad 2
			if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Ad Sidebar 2') );
	
		echo '</div>';

	}

?>