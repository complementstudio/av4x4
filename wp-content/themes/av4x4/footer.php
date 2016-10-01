<?php
/**
 * The template for displaying the footer
 *
 *
 * @package WordPress
 * @subpackage av4x4
 * @since av4x4 1.0
 */
global $wpdb;
$table_name = $wpdb->prefix . "av4x4_settings";
$query = "SELECT * FROM {$table_name} LIMIT 1";
$results = $wpdb->get_results( $query );
$data = json_decode($results[0]->settings);
$max_count = 24;
$our_posts = get_posts(array(
	'post_type' => 'services',
	'post_status' => 'publish',
	'suppress_filters' => false,
	'posts_per_page' => $max_count,
	'cat' =>  3,
));

$our_main_serv_count = count($our_posts);
if($our_main_serv_count <= $max_count) {
	$show_other_count = $max_count - $our_main_serv_count;
	$other_posts = get_posts(array(
		'post_type' => 'services',
		'category__not_in' =>  3,
		'posts_per_page' => $show_other_count,
	));
	$services = array_merge($our_posts,$other_posts);
}

?>
<div class="home_footer clearfix">
	<div class="footer_wrapper">

			<div class=" list-unstyled list-inline">
				<div  class="first_block">
					<a href="/our-services/" class="menu_title">Our Services</a>
					<?php if(!empty($services)) : ?>
							<?php
								$i = 0;
								foreach($services as $service) :
									if(empty($service->post_name)) {
										$url = $service->guid;
									} else {
										$url = $service->post_name;
									}
								?>
								<?php if($i == 0) : ?>
								<ul class="list-unstyled footer_menu">
								<?php endif; ?>
								<li><a href="<?=$url?>"><?=$service->post_title?></a></li>
								<?php if($i == 7) : ?>
								</ul>
								<?php endif; ?>
								<?php
									$i++;
									if($i > 7) {
										$i = 0;
									}
									endforeach;
								?>
					<?php endif; ?>
				</div>
				<div  class="second_block">
				<?php echo do_shortcode("[footer_menu_2 name='Footer_nav_2']"); ?>
				</div>
				<div  class="second_block">
				<?php echo do_shortcode("[footer_menu_2 name='Footer_nav_3']"); ?>
				</div>

			</div>
			<?php echo do_shortcode("[sc name='Footer Contact']"); ?>
		</div>
</div>
<div id="map" style="width:100%;height:570px"></div>
<div class="bottom_footer clearfix">
	<p><a href="<?=get_permalink(326)?>">Site Map</a>  <a href="<?=get_permalink(329)?>">Privacy Policy </a> · © Copyright <?=date('Y')?></p>
	<ul class="list-unstyled list-inline">
		<li>website by</li>
		<li><img src="<?php echo get_template_directory_uri(); ?>/images/footer_img.png" alt=" logo" style="margin-right: 5px"><a href="javascript:void(0)">Complement Studio </a></li>
	</ul>
</div>

<script>
	function myMap() {
		var grayStyles = [
			{
				featureType: "all",
				stylers: [
					{ saturation: -90 },
					{ lightness: 10 }
				]
			}
		];
		var map_lat = "<?=$data->map_lat?>";
		var map_lng = "<?=$data->map_long?>";
		if(!map_lat && !map_lng) {
			map_lat = 43.6110757;
			map_lng = -116.3786824;
		}
		var myCenter = new google.maps.LatLng(map_lat,map_lng);
		var mapCanvas = document.getElementById("map");
		var mapOptions = {center: myCenter, zoom: 16,  styles: grayStyles,scrollwheel: false};
		var map = new google.maps.Map(mapCanvas, mapOptions);
		var image = '<?php echo get_template_directory_uri(); ?>/images/map-marker.png';
		var icon = {
			url: image, // url
			scaledSize: new google.maps.Size(40, 60), // scaled size
			origin: new google.maps.Point(0,0), // origin
			anchor: new google.maps.Point(0, 0) // anchor
		};
		var beachMarker = new google.maps.Marker({
			position: myCenter,
			map: map,
			icon: icon
		});

	}

</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyCQmIJv00arIDmoZ3c6f1s8fhXq-UFuHvQ"></script>

<?php wp_footer(); ?>
</body>
</html>