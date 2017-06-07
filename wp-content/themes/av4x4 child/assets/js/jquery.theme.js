/*

	1 - HOVERS: FEATURED POSTS

		1.1 - Append a common hover
		1.2 - Post height

*/

/* jshint -W099 */
/* global jQuery:false, stData:false */

var t = jQuery.noConflict();

t(function(){

	'use strict';

/*

	stData[0] - Primary color
	stData[1] - Secondary color

*/

/*===============================================

	H O V E R S :   F E A T U R E D   P O S T S
	Animated hovers for sticky posts

===============================================*/

	/*-------------------------------------------
		1.1 - Append a common hover
	-------------------------------------------*/

	t('.post-thumb')

		.hover(

			function(){

				if ( !t(this).hasClass('inProgress') ) {

					t(this).addClass('inProgress');
	
					var
						width = t(this).outerWidth(true),
						height = t(this).outerHeight(true),
						format = t(this).attr('data-format'),
						hover = '<div class="st-hover" style="width: ' + width + 'px; height: ' + height + 'px;"><div class="st-hover-bg" style="width: ' + width + 'px; height: ' + height + 'px; background: #' + stData[0] + ';"><!-- bg --></div><div class="st-hover-format st-hover-format-' + format + '"><!-- --></div></div>';
			
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

			}

		);


	/*-------------------------------------------
		1.2 - Post height
	-------------------------------------------*/

	function st_feat_posts_enable() {

		var
			aHeightThumb = t('.posts-featured-a-wrapper .post-thumb').height(),
			aHeightDetails = t('.posts-featured-a-wrapper .posts-featured-details-wrapper > div').outerHeight(),
			bHeightThumb = t('.posts-featured-b-wrapper .post-thumb').height(),
			bHeightDetails = 0,
			cHeightDetails = 0,
			rHeightDetails = 0,
			screenFactor = 0;

			if ( t('#content-holder').width() == 1200 ) {
				screenFactor = 50; }
			if ( t('#content-holder').width() == 935 ) {
				screenFactor = 25; }


			// 1 - B posts
			t('.posts-featured-b-wrapper .posts-featured-details-wrapper > div').each(function(){

				if ( t(this).outerHeight(true) > bHeightDetails ) {
					bHeightDetails = t(this).outerHeight(true); }

			});

			// Correction
			if ( t('#content-holder').width() > 591 ) {

				if ( aHeightDetails + aHeightThumb < ( bHeightThumb + bHeightDetails ) * 2 ) {
					bHeightDetails = bHeightDetails + 25;
					aHeightDetails = bHeightDetails * 2;
				}
				else {
					bHeightDetails = Math.ceil( ( aHeightThumb + aHeightDetails - bHeightThumb * 2 ) / 2 );
					aHeightDetails = aHeightDetails + screenFactor;
				}

			}
			else {

				aHeightDetails = aHeightDetails + 25;
				bHeightDetails = bHeightDetails + 25;

			}


			// 2 - C posts
			t('.posts-featured-c-wrapper .posts-featured-details-wrapper > div').each(function(){

				if ( t(this).outerHeight(true) > cHeightDetails ) {
					cHeightDetails = t(this).outerHeight(true); }

			});

			// Correction
			if ( t('#content-holder').width() > 591 ) {
				cHeightDetails = cHeightDetails + 25;
			}
			else {
				cHeightDetails = bHeightDetails;
			}


			// 3 - Related posts
			t('.posts-related-details-wrapper > div').each(function(){

				if ( t(this).outerHeight() > rHeightDetails ) {
					rHeightDetails = t(this).outerHeight(); }

			});

			// Set dimentions
			t('.posts-featured-a-wrapper .posts-featured-details-wrapper').stop(true, false).animate({ 'height': aHeightDetails }, 250, function(){ t(this).eq(0).animate({ 'opacity': '1' }, 500); });
			t('.posts-featured-b-wrapper .posts-featured-details-wrapper').stop(true, false).animate({ 'height': bHeightDetails }, 250, function(){ t(this).eq(0).animate({ 'opacity': '1' }, 500); });
			t('.posts-featured-c-wrapper .posts-featured-details-wrapper').stop(true, false).animate({ 'height': cHeightDetails }, 250, function(){ t(this).eq(0).animate({ 'opacity': '1' }, 500); });
			t('.posts-related-wrapper .posts-related-details-wrapper').stop(true, false).animate({ 'height': rHeightDetails }, 250, function(){ t(this).eq(0).animate({ 'opacity': '1' }, 500); });

	}

	function st_the_feat_posts_enable() {
		setTimeout( st_feat_posts_enable, 250 );
	}

	st_the_feat_posts_enable();

	t(window).resize( st_the_feat_posts_enable );

});