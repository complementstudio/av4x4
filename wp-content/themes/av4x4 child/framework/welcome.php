<?php if ( !defined( 'ABSPATH' ) ) exit;

	global
		$st_Options,
		$st_Settings;

		$st_['step'] = '2';
		if ( !empty( $_GET['step'] ) ) {
			$st_['step'] = wp_kses( $_GET['step'], $st_Options['tags_empty'] ); }

?>
<div class="wrap about-wrap st-about-wrap">
	<div class="st-feature">
		<div>
			<?php
				if ( $st_['step'] == '2' ) {
					echo sprintf( wp_kses( __( "<h2>Welcome to</h2><h1>%s <span>v.%s</span></h1>", 'strictthemes' ), $st_Options['tags_allowed'] ), $st_Options['general']['label'], $st_Options['general']['version'] ); }
				if ( $st_['step'] == '3' ) {
					echo sprintf( wp_kses( __( "<h2>%s <span>v.%s</span></h2><h1>Setup Process</h1>", 'strictthemes' ), $st_Options['tags_allowed'] ), $st_Options['general']['label'], $st_Options['general']['version'] ); }
			?>
			<p><?php echo sprintf( wp_kses( __( "Thank you for choosing the theme created by <a target='_blank' href='http://strictthemes.com/to/portfolio/'>StrictThemes</a> team. Please follow further installation process for getting a clone of <a target='_blank' href='%s'>Demo Site</a>", 'strictthemes' ), $st_Options['tags_allowed'] ), $st_Options['general']['url-demo'] ); ?></p>
		</div>
		<div>
			<img src="<?php echo esc_url( wp_get_theme()->get_screenshot() ) ?>" />
		</div>

	</div>
	<div class="welcome-panel st-welcome-panel">
		<div class="welcome-panel-content">
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<?php
						if ( $st_['step'] == '2' ) { ?>
							<h3><?php esc_html_e( 'Next Step', 'strictthemes' ) ?> (2/3)</h3>
							<div class="about-text"><?php esc_html_e( "On the next page you'll prompted to install a list of required plugins. Install all of them and go back here.", 'strictthemes' ) ?></div>
							<a href="<?php echo admin_url('themes.php?page=tgmpa-install-plugins') ?>" class="button button-primary button-hero"><?php esc_html_e( 'Go to Plugins', 'strictthemes' ) ?></a><?php
						}
						if ( $st_['step'] == '3' ) { ?>
							<h3><?php esc_html_e( 'Next Step', 'strictthemes' ) ?> (3/3)</h3>
							<div class="about-text"><?php esc_html_e( "Great! All plugins have been installed. So you can make the final step with Setup Wizard. It will import a dummy content, widgets, menus and all other settings.", 'strictthemes' ) ?></div>
							<a href="<?php echo admin_url('admin.php?page=' . ( strtolower( preg_replace( '#[^a-zA-Z]#','', wp_get_theme()->get( 'Name' ) ) ) ) . '-setup') ?>" class="button button-primary button-hero"><?php esc_html_e( 'Start Setup Wizard', 'strictthemes' ) ?></a><?php
						}
					?>
				</div>
				<div class="welcome-panel-column welcome-panel-column-2">
					<h3><?php esc_html_e( 'Do not forget:', 'strictthemes' ) ?></h3>
					<ul>
						<li><a class="welcome-icon dashicons-facebook" target="_blank" href="https://www.facebook.com/StrictThemes"><?php esc_html_e( 'Follow Us on Facebook', 'strictthemes' ) ?></a></li>
						<li><a class="welcome-icon dashicons-smiley" target="_blank" href="http://themeforest.net/downloads"><?php echo sprintf( esc_html__( "Rate the %s theme", 'strictthemes' ), $st_Options['general']['label'] ); ?></a></li>
						<li><a class="welcome-icon dashicons-cart" target="_blank" href="http://strictthemes.com/to/<?php echo esc_html( $st_Options['general']['label'] ) ?>"><?php echo sprintf( esc_html__( "Buy Another License of %s", 'strictthemes' ), $st_Options['general']['label'] ); ?></a></li>
						<?php

							if ( file_exists( get_template_directory() . '/demo/learn.txt' ) ) {

								$st_['misc'] = unserialize( base64_decode( wp_filter_nohtml_kses( file_get_contents( get_template_directory() . '/demo/learn.txt' ) ) ) );
								$st_['key'] = rand( 0, 1 );

								echo '<li><a class="welcome-icon welcome-learn-more" target="_blank" href="' . $st_['misc'][$st_['key']]['value'] . '">' . $st_['misc'][$st_['key']]['label'] . '</a></li>';

							}

						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>