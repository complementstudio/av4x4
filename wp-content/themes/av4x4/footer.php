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
?>
<div class="home_footer clearfix">
	<div class="footer_wrapper">
		<div  class="first_block">
			<p>OUR SERVICES</p>
			<ul class="list-unstyled footer_menu">
				<li><a href="javascript:void(0)">  Roll Cages </a></li>
				<li><a href="javascript:void(0)">  3D CAD Design </a></li>
				<li><a href="javascript:void(0)">   Welding </a></li>
				<li><a href="javascript:void(0)">   Engine Swaps</a></li>
				<li><a href="javascript:void(0)">  Tire Carrieres </a></li>
				<li><a href="javascript:void(0)">  Power Steering </a></li>
				<li><a href="javascript:void(0)">  Axle Retubing </a></li>
				<li><a href="javascript:void(0)">  Skid Plates </a></li>
			</ul>
			<ul class="list-unstyled footer_menu">
				<li><a href="javascript:void(0)">  Roll Cages </a></li>
				<li><a href="javascript:void(0)">  3D CAD Design </a></li>
				<li><a href="javascript:void(0)">   Welding </a></li>
				<li><a href="javascript:void(0)">   Engine Swaps</a></li>
				<li><a href="javascript:void(0)">  Tire Carrieres </a></li>
				<li><a href="javascript:void(0)">  Power Steering </a></li>
				<li><a href="javascript:void(0)">  Axle Retubing </a></li>
				<li><a href="javascript:void(0)">  Skid Plates </a></li>
			</ul>
			<ul class="list-unstyled footer_menu">
				<li><a href="javascript:void(0)">  Roll Cages </a></li>
				<li><a href="javascript:void(0)">  3D CAD Design </a></li>
				<li><a href="javascript:void(0)">   Welding </a></li>
				<li><a href="javascript:void(0)">   Engine Swaps</a></li>
				<li><a href="javascript:void(0)">  Tire Carrieres </a></li>
				<li><a href="javascript:void(0)">  Power Steering </a></li>
				<li><a href="javascript:void(0)">  Axle Retubing </a></li>
				<li><a href="javascript:void(0)">  Skid Plates </a></li>
			</ul>
		</div>
		<div class="second_block">
			<p>THE CREW</p>
			<ul class="list-unstyled footer_menu">
				<li><a href="javascript:void(0)">   Kevin Mereness </a></li>
				<li><a href="javascript:void(0)">   Thomas Ege </a></li>
				<li><a href="javascript:void(0)">   Cary Reese </a></li>
			</ul>
			<p>CUSTOMER REVIEWS</p>
			<p>GALLERY</p>
		</div>
		<div   class="second_block">
			<p>RESTORATIONS</p>
			<ul class="list-unstyled footer_menu">
				<li><a href="javascript:void(0)"> JK 67</a></li>
				<li><a href="javascript:void(0)"> CJ 88 / New Engine </a></li>
			</ul>
			<p>BLOG</p>
			<ul class="list-unstyled footer_menu">
				<li><a href="javascript:void(0)"> 12/31 - Thanks for having attended…</a></li>
				<li><a href="javascript:void(0)"> 12/31 - Thanks for having attended…</a></li>
			</ul>
		</div>
		<div class="last_block">
			<div class="clearfix">
				<ul class="list-unstyled list-inline social_icons_btn">
					<li> Connect with AV4x4</li>
					<li><a href="javascript:void(0)"><i class="ion-social-facebook"></i> </a></li>
					<li><a href="javascript:void(0)"><i class="ion-social-instagram"></i> </a></li>
					<li><a href="javascript:void(0)"><i class="ion-social-youtube"></i> </a></li>
				</ul>
			</div>
			<p>AMERICAN VINTAGE 4x4</p>
			<ul class="list-unstyled contacts">
				<li> 707 Ralstin, Meridian, ID 83642</li>
				<li>sales@av4x4.com </li>
				<li>Phone: (208) 863-1718 </li>
				<li> Fax: (208) 864-1234 </li>
			</ul>
		</div>
	</div>
</div>
<div id="map" style="width:100%;height:570px"></div>
<div class="bottom_footer clearfix">
	<p><a href="javascript:void(0)">Site Map</a>  <a href="javascript:void(0)">Privacy Policy </a> · © Copyright 2016</p>
	<ul class="list-unstyled list-inline">
		<li>website by</li>
		<li><img src="<?php echo get_template_directory_uri(); ?>/images/footer_img.png" alt=" logo" style="margin-right: 5px"><a href="javascript:void(0)">Complement Studio </a></li>
	</ul>
</div>

<script>
	jQuery('.header_slider').slick({
		arrows: false,
		autoplay: true,
		infinite: true,
		speed: 1000,
		fade: true,
		cssEase: 'linear'
	});


	jQuery('.home_slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: 1470,
				settings: {
					arrows: false
				}
			},
			{
				breakpoint: 1200,
				settings: {
					arrows: false,
					slidesToShow: 3
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					arrows: false
				}
			},
			{
				breakpoint: 400,
				settings: {
					arrows: false,
					slidesToShow: 1
				}
			}

		]
	});

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