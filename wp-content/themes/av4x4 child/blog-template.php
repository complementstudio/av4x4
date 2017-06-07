<?php
/**
* Template Name: newBlog
*
*/
?>
<?php 
wp_enqueue_style('grimag_style', get_stylesheet_directory_uri().'/grimag/style.css');
?>
<?php get_header();?>
<div id="content">
	<div id="content-layout">		
		<div id="content-holder" class="sidebar-position-right">
			<div class="posts-featured-wrapper">
			<?php 
				$feautured_args = array('post_type' => 'post', 'posts_per_page' => 9);
				$loop_f = new WP_Query($feautured_args);
			
			if($loop_f->have_posts()){
			
			while($loop_f->have_posts()){
				$loop_f->the_post();
				$format = get_post_format();
								if($format==''){
									$format='standard';
								}	
				switch($fi){
					case 0:
					$class = 'posts-featured-a-wrapper';
					$post_header = "<h1>";
					$post_header_end = "</h1>";
					break;
					case 1:
					$class = 'posts-featured-b-wrapper b-even';
					$post_header = "<h3>";
					$post_header_end = "</h3>";
					break;
					case 2:
					$class = 'posts-featured-b-wrapper b-odd';
					$post_header = "<h3>";
					$post_header_end = "</h3>";
					break;
					case 3:
					$class = 'posts-featured-b-wrapper b-even';
					$post_header = "<h3>";
					$post_header_end = "</h3>";
					break;
					case 4:
					$class = 'posts-featured-b-wrapper b-odd';
					$post_header = "<h3>";
					$post_header_end = "</h3>";
					break;
					case 5:
					$class = 'posts-featured-c-wrapper c-even first';
					$post_header = "<h3>";
					$post_header_end = "</h3>";
					break;
					case 6:
					$class = 'posts-featured-c-wrapper c-odd';
					$post_header = "<h3>";
					$post_header_end = "</h3>";
					break;
					case 7:
					$class = 'posts-featured-c-wrapper c-even';
					$post_header = "<h3>";
					$post_header_end = "</h3>";
					break;
					case 8:
					$class = 'posts-featured-c-wrapper c-odd last';
					$post_header = "<h3>";
					$post_header_end = "</h3>";
					break;
				}
			?>					
				<div class="<?php echo $class.' '.$fi;?>">
					<a href="<?php the_permalink();?>" class="post-thumb" data-hidpi="<?php echo $loop_f->get_the_post_thumbnail_url();?>" style="background-image: url(<?php the_post_thumbnail_url();?>)" data-format="<?php echo $format;?>">
						<div class="st-hover" style="width: 574px; height: 410px; margin-top: -410px;">
							<div class="st-hover-bg" style="width: 574px; height: 410px; background: #494158;"><!-- bg -->
							</div>
							<div class="st-hover-format st-hover-format-<?php echo $format;?>" style="opacity: 0; bottom: 0px; margin-bottom: 0px;"><!-- -->
							</div>
						</div>
					</a>
				<div class="posts-featured-details-wrapper" style="height: <?php if($fi==0){echo '265px';}else{echo '133px';}?>; opacity: 1;">
				<div>
					<?php echo $post_header;?>
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
					<?php echo $post_header_end;?>
					<?php
if($fi==0){the_excerpt();}
					?>
					<div class="meta">
					<?php if($fi==0){ ?>
						<span class="ico16 ico16-link"><a href="http://strictthemes.com/grimag/type/link/"><?php echo $format;?></a></span>
						<?php }?>						
						<span class="ico16 ico16-comment-2"><a><?php echo wp_count_comments( get_the_ID() )->total_comments; ?> </a></span>
						<span class="ico16 ico16-views"><?php setPostViews(get_the_ID()); ?>122</span>							
						<span class="ico16 ico16-link"><a href="<?php the_permalink();?>">More</a></span>			
					</div><!-- .meta -->
				</div>
			</div>
		</div>
<?php $fi++;}}?> <!--END OF LOOP-->










			<div id="content-box">
			<div>
					<div>
					<?php 
				$args = array('post_type' => 'post', 'posts_per_page' => 9, 'paged' => 1,'offset' => 9);
				$loop = new WP_Query($args);

			?>
						<?php 
						if($loop->have_posts()){
						while($loop->have_posts()){ 
							$loop->the_post(); 
								$format = get_post_format();
								if($format==''){
									$format='standard';
								}	
							?>
				
						<div id="post-<?php echo get_the_id();?>" class="post-template post-t4 post-44 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
						<div class="thumb-wrapper"><a href="http://strictthemes.com/grimag/audio-post-format-with-self-hosted-media/" class="post-thumb" data-hidpi="<?php the_post_thumbnail_url();?>" style="background-image: url(<?php the_post_thumbnail_url();?>)" data-format="<?php echo $format;?>"><div class="st-hover" style="width: 262px; height: 180px; margin-top: -180px;"><div class="st-hover-bg" style="width: 262px; height: 180px; background: #494158;"><!-- bg --></div><div class="st-hover-format st-hover-format-<?php echo $format;?>" style="opacity: 0; bottom: 0px; margin-bottom: 0px;"><!-- --></div></div></a></div>
							<h3><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h3>
								<p><?php the_excerpt();?></p>
							<div class="meta">
							<?php if($format!='standard'){?>
								<span class="ico16 ico16-<?php echo $format; ?>"><?php echo get_post_format();?></span><?php } ?>
								<span class="ico16 ico16-calendar"><a><?php echo human_time_diff( strtotime(get_the_date('F d, y')), time());?></a></span>
								<span class="ico16 ico16-link"><a href="<?php the_permalink();?>">More</a></span>			
							</div><!-- .meta -->
							<div class="clear"><!-- --></div>
							
						</div>
						<div class="clear"><!-- --></div>
						<?php } }/* END OF LOOP */?>
						<?php 

						?>
						<div id="wp-pagenavibox">
						<div id="but-prev-next">
<?php previous_posts_link( '«', $loop->max_num_pages-1); ?>
<?php 
for($i=1; $i<$loop->max_num_pages; $i++){ 
	if($i!=get_query_var('paged')){ ?>
		<a href="<?php echo get_site_url().'/blog/page/'.$i.'/';?>"><?php echo $i;?></a>
<?php
	 }
	 else
	 { ?>
		<span class="current" style="padding:0.7em 1em"><?php echo $i;?></span>
<?php
	}
} ?>
<?php next_posts_link( '»', $loop->max_num_pages-1); ?>
						</div></div>
					</div>
				</div>

			</div><!-- #content-box -->
<div id="sidebar"><div class="sidebar">
<?php get_sidebar(); ?>
</div></div>

<div class="clear"><!-- --></div>

</div><!-- #content-holder -->

</div><!-- #content-layout -->

</div>
<?php get_footer();?>

<script>
	var t = jQuery.noConflict();

t(function(){

	'use strict';
	t('.post-thumb')
		.hover(
			function(){
				if ( !t(this).hasClass('inProgress') ) {
					t(this).addClass('inProgress');
					var
						width = t(this).outerWidth(true),
						height = t(this).outerHeight(true),
						format = t(this).attr('data-format'),
						hover = '<div class="st-hover" style="width: ' + width + 'px; height: ' + height + 'px;"><div class="st-hover-bg" style="width: ' + width + 'px; height: ' + height + 'px; background: #000;"><!-- bg --></div><div class="st-hover-format st-hover-format-' + format + '"><!-- --></div></div>';
						
						t(this).html( hover );
						t('.st-hover',this).stop(true, false).css({ 'margin-top': '-' + height + 'px' }).animate({ 'margin-top': 0 }, 250 );
						t('.st-hover-format',this).stop(true, false).animate({ 'opacity': 1, 'margin-bottom': '-16px', 'bottom': '50%' }, 250 );
				}
			},
			function(){
				if ( t(this).hasClass('inProgress') ) {
					var
						height = t(this).outerHeight(true);
						t('.st-hover-format',this).stop(true, false).animate({ 'opacity': 0, 'margin-bottom': 0, 'bottom': 0 }, 250 );
						t('.st-hover',this).animate({ 'margin-top': '-' + height + 'px' }, 250, function(){ t(this).parent().removeClass('inProgress'); } );
				}
			});
});
</script>
<style type="text/css">
	.post-t4 h3 a{
	font-weight: 700;
}
</style>>
