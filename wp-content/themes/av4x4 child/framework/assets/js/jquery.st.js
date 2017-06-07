// /*

// 	01. - Dinamic styles holder
// 	02. - Drop-Down menu
// 	03. - Quick reply form
// 	04. - Textarea
// 	05. - Sticked div
// 	06. - Tag cloud
// 	07. - Archives & Categories
// 	08. - Original size of images
// 	09. - Max size for YouTube & Vimeo video
// 	10. - ST Gallery
// 	11. - Sticked menu
// 	12. - Search form on header
// 	13. - BuddyPress fixes

// */

// /* jshint -W099 */
// /* global jQuery:false */

// var p = jQuery.noConflict();

// p(function(){

// 	'use strict';



// /*==01.==========================================

//  	D I N A M I C   S T Y L E S
// 	Holder for dinamic styles

// ===============================================*/

// 	if ( !p('#st-dynamic-css').length ) {

// 		p('head').append('<style id="st-dynamic-css" type="text/css"></style>');

// 	}



// /*==02.==========================================

// 	D R O P - D O W N   M E N U
// 	Main menu on responsive mode

// ===============================================*/

// /*

// 	1 - DROP-DOWN MENU

// 		1.1 - Default
// 		1.2 - Custom

// */

// 	/*-------------------------------------------
// 		1.1 - Default
// 	-------------------------------------------*/

// 	p('#menu #page_id').change(function() {

// 		var
// 			val = p(this).val();

// 			if ( val ) {
// 				p(this).parent().submit(); }

// 	});


// 	/*-------------------------------------------
// 		1.2 - Custom
// 	-------------------------------------------*/

// 	p('#selectElement').change(function() {

// 		if ( p(this).val() ) {
// 			window.open( p(this).val(), '_parent' ); }

// 	});



// /*==03.==========================================

// 	Q U I C K   R E P L Y   F O R M
// 	Append and remove quick form

// ===============================================*/

// /*

// 	1 - QUICK REPLY FORM

// 		1.1 - Open form
// 		1.2 - Cancel reply

// */

// 	/*-------------------------------------------
// 		1.1 - Open form
// 	-------------------------------------------*/

// 	p('a.quick-reply').click(function(){


// 		/*--- First of all -----------------------------*/

// 		// Make previous Reply link visible
// 		p('.quick-reply').removeClass('none');

// 		// Make previous Cancel Reply link hidden
// 		p('.quick-reply-cancel').addClass('none');

// 		// Erase all quick holders
// 		p('.quick-holder').html('');

// 		// Make comment form visible
// 		p('#commentform').removeClass('none');


// 		/*--- Append new form -----------------------------*/

// 		var
// 			id = p(this).attr('title'),
// 			form = p('#respond').html();

// 			// Make this Reply link hidden
// 			p(this).addClass('none');

// 			// Make this Cancel Reply link visible
// 			p(this).next().removeClass('none');

// 			// Hide major form
// 			p('#commentform, #reply-title').addClass('none');

// 			// Put the form to the holder
// 			p('#quick-holder-' + id).append(form).find('h3').remove();

// 			// Set an ID for hidden field
// 			p('#quick-holder-' + id + ' input[name="comment_parent"]').val(id);

// 			// Fix placeholders for IE8,9
// 			if ( p('#ie-version').hasClass('ie-version-8') || p('#ie-version').hasClass('ie-version-9') ) {
				
// 				p('.input-text-box input[type="text"], .input-text-box input[type="email"], .input-text-box input[type="url"]', '#quick-holder-' + id).each( function(){ p(this).val( p(this).attr('placeholder') ); } );

// 			}


// 		return false;

// 	});


// 	/*-------------------------------------------
// 		1.2 - Cancel reply
// 	-------------------------------------------*/

// 	p('.quick-reply-cancel').click(function(){

// 		// Make previous Reply link visible
// 		p('.quick-reply').removeClass('none');

// 		// Make this Cancel Reply link hidden
// 		p(this).addClass('none');

// 		// Erase all quick holders
// 		p('.quick-holder').html('');

// 		// Make comment form visible
// 		p('#commentform, #reply-title').removeClass('none');

// 		return false;

// 	});



// /*==04.==========================================

//  	T E X T A R E A
// 	Animation by focus

// ===============================================*/

// 	p('#layout').on('focus', 'textarea', function() {

// 		if ( !p(this).is('#whats-new') && p(this).height() < 151 && ! p(this).hasClass( 'height-ready' ) ) {

// 			p(this)
// 				.css({ height: 70 })
// 				.animate({ height: 150 }, 300, function(){ p(this).addClass( 'height-ready' ); });

// 		}

// 	});



// /*==05.==========================================

//  	S T I C K E D   D I V
// 	Sticked container

// ===============================================*/

// 	st_sticky_div();

// 	function st_sticky_div() {

// 		if ( p('#stickyDiv').length ) {
	
// 			var
// 				el = p('#stickyDiv'),
// 				stickyTop = p('#stickyDiv').offset().top,
// 				margin = p('#wpadminbar').length ? p('#wpadminbar').height() : 0;

// 				p(window).scroll(function(){

// 					var
// 						stickyHeight = p('#stickyDiv').outerHeight(true),
// 						limit = p('#home_footer').offset().top - stickyHeight,
// 						windowTop = p(window).scrollTop();


// 						/*--- by top -----------------------------*/
	
// 						if ( stickyTop < windowTop + 90 + margin ) {

// 							el.css({ position: 'fixed', top: 90 + margin });

// 						}
	
// 						else {

// 							el.css( 'position', 'static' );
	
// 						}

	
// 						/*--- by footer -----------------------------*/
	
// 						if ( limit < windowTop + 90 ) {
							
// 							var
// 								diff = limit - windowTop;

// 								el.css({ position: 'fixed', top: diff });
	
// 						}

// 				});
	
// 		}

// 	}



// /*==06.==========================================

//  	T A G   C L O U D
// 	Add number of posts for each tag

// ===============================================*/

// 	p('.tagcloud a').each(function(){

// 		var
// 			number = p(this).attr('title').split(' ');

// 			number = '<span>' + number[0] + '</span>';

// 			p(this).append(number).attr('title','');

// 	});



// /*==07.==========================================

//  	A R C H I V E S & C A T E G O R I E S
// 	Replace count wrapper on widgets,
// 	e.g. from (7) to <span>7</span>

// ===============================================*/

// 	p('.widget_archive li, .widget_categories li').each(function(){

// 		var
// 			str = p(this).html();

// 			str = str.replace(/\(/g,"<span>");
// 			str = str.replace(/\)/g,"</span>");
			
// 			p(this).html(str);

// 	});



// /*==08.==========================================

//  	O R I G I N A L   S I Z E
// 	For images and others

// ===============================================*/

// 	p('.size-original').removeAttr('width').removeAttr('height');



// /*==09.==========================================

//  	V I D E O   R E S I Z E
// 	Max size for YouTube & Vimeo video

// ===============================================*/

// 	function st_video_resize() {

// 		p('iframe').each(function(){

// 			var
// 				src = p(this).attr('src');

// 				if ( src ) {

// 					var
// 						check_youtube = src.split('youtube.com'),
// 						check_vimeo = src.split('vimeo.com');
						
// 						if ( check_youtube[1] || check_vimeo[1] ) {
		
// 							var
// 								width = p(this).parent().width(),
// 								height = width * 0.61;
		
// 								if ( width > 1 ) {
// 									p(this).css({ 'width': width, 'height': height }); }
		
// 						}

// 				}

// 		});

// 	}

// 	st_video_resize();

// 	p(window).resize( st_video_resize );



// /*==10.==========================================

//  	S T   G A L L E R Y
// 	ST Gallery script

// ===============================================*/

// 	stG_init();
	
// 	function stG_init() {

// 		p('.st-gallery').each(function(){

// 			p('img',this).addClass('st-gallery-pending').last().addClass('st-gallery-last');

// 			var
// 				slides = p(this).html(),
// 				check = slides.split('img'),
// 				controls = '<ol>';

// 				for ( var i = 1; i < check.length; i++ ) {
// 					if ( i === 1 ) {
// 						controls += '<li class="st-gallery-tab-current"></li>'; }
// 					else {
// 						controls += '<li></li>'; }
// 				}

// 				controls += '</ol>';

// 				p(this).html( '<div>' + slides + '</div>' + controls );

// 				p('div img:first-child',this).removeClass('st-gallery-pending').addClass('st-gallery-current');

// 		});

// 	}

// 	p('.st-gallery div img').on( 'click touchstart', function(){

// 		if ( ! p(this).parent().hasClass('st-gallery-locked') ) {

// 			var
// 				img = p(this),
// 				gallery = p(this).parent(),
// 				current = gallery.find('.st-gallery-current'),
// 				hCurrent = gallery.height(),
// 				imgIndex = img.prevAll().length,
// 				tabs = img.parent().next( 'ol' );

// 				gallery.addClass('st-gallery-locked');

// 				var
// 					nextImage = ( current.hasClass('st-gallery-last') ? gallery.find('img').first() : gallery.children().eq( imgIndex + 1 ) );

// 					current
// 						.removeClass('st-gallery-current').addClass('st-gallery-flushed').stop(true,false)
// 						.animate({ 'opacity': 0 }, 300,
// 							function(){
// 								p(this).removeAttr('style').removeClass('st-gallery-flushed').addClass('st-gallery-pending');
// 								gallery.removeClass('st-gallery-locked');
// 							});

// 					nextImage.removeClass('st-gallery-pending').addClass('st-gallery-current');

// 					var
// 						hNext = nextImage.height();

// 						if ( hNext !== 0 ) {
// 							gallery.css( 'height', hCurrent ).stop(true,false).animate({ 'height': hNext }, 700 ); }
// 						else {
// 							gallery.css( 'height', 'auto' ); }

// 					var
// 						currentTab = nextImage.prevAll().length;
	
// 						tabs.children( '.st-gallery-tab-current' ).removeClass( 'st-gallery-tab-current' );
// 						tabs.children().eq( currentTab ).addClass( 'st-gallery-tab-current' );

// 		}

// 	});

// 	p('.st-gallery ol li').click(function(){

// 		p(this).each(function(){

// 			var
// 				no = p(this).prevAll().length,
// 				gallery = p(this).parent().parent().find('div'),
// 				current = gallery.find('.st-gallery-current'),
// 				h = gallery.children().eq( no ).height();

// 				p(this).parent().find('.st-gallery-tab-current').removeClass('st-gallery-tab-current');
// 				p(this).addClass('st-gallery-tab-current');

// 				current.removeClass('st-gallery-current').addClass('st-gallery-pending');

// 				gallery.css( 'height', h );

// 				gallery.children().eq( no )
// 					.removeClass('st-gallery-pending')
// 					.addClass('st-gallery-flushed')
// 					.css({ opacity: 0 })
// 					.animate({ opacity: 1 }, 300, 
// 						function(){
// 							p(this).removeClass('st-gallery-flushed').addClass('st-gallery-current').removeAttr('style');
// 							gallery.removeAttr('style');
// 						});

// 		});

// 	});



// /*==11.==========================================

//  	S T I C K E D   M E N U
// 	Sticked primary menu

// ===============================================*/

// 	function st_sticky_menu() {

// 		if ( p('#menu').length && !p('#menu').hasClass('no-sticky-menu') ) {
	
// 			var
// 				el = p('#menu'),
// 				stickyTop = p('#menu').offset().top,
// 				stickyHeight = p('#menu').outerHeight(true),
// 				margin = p('#wpadminbar').length ? p('#wpadminbar').height() : 0;
	
// 				p(window).scroll(function(){

// 					if ( p('#content-holder').width() > 934 ) {

// 						var
// 							windowTop = p(window).scrollTop();
		
		
// 							if ( stickyTop < windowTop - 1000 ) {
	
// 								if ( !el.hasClass('menu-sticky') ) {
// 									el.addClass('menu-sticky').addClass('menu-sticky-now').css({ opacity: 1, top: -stickyHeight }).stop(true,false).animate({ top: 0 + margin }, 300);
// 									p('#header-holder').css({ paddingBottom: stickyHeight });
// 									st_search_on_top();
// 								}
		
// 							}
		
// 							else {
	
// 								if ( el.hasClass('menu-sticky-now') ) {

// 									el.removeClass('menu-sticky-now').stop(true,false).animate({ top: -stickyHeight }, 300,
// 										function(){
// 											el.css({ 'display': 'table', top: 'auto', opacity: 0 }).removeClass('menu-sticky').stop(true,false).animate({ opacity: 1 }, 300, function(){ p('#menu').removeAttr('style'); });
// 											p('#header-holder').css({ paddingBottom: 0 });
// 											st_search_on_top();
// 										});

// 								}
	
// 							}

// 					}

// 					else {

// 						if ( el.hasClass('menu-sticky') ) {

// 							el.css({ opacity: 1, top: 'auto' }).removeClass('menu-sticky');
// 							p('#header-holder').css({ paddingBottom: 0 });

// 						}

// 					}

// 				});

// 		}

// 	}

// 	function st_the_sticky_menu() {
// 		st_sticky_menu();
// 	}

// 	st_the_sticky_menu();

// 	p(window).resize( st_the_sticky_menu );


// /*==12.==========================================

// 	S E A R C H
// 	Search form on header

// ===============================================*/

// 	/*-------------------------------------------
// 		2.1 - Search
// 	-------------------------------------------*/

// 	setInterval(st_search_on_top, 500);

// 	function st_search_on_top() {

// 		var
// 			barH = p('#menu .menu').height() + 1;

// 			p('#search-form-header span, #search-form-header input').css({ 'height': barH });
// 			p('#search-form-header').show();

// 	}

// 	p('#search-form-header span').click(function(){

// 		var
// 			width = 320;

// 			if ( p('#content-holder').width() == 1200 ) {
// 				width = 313; }
// 			if ( p('#content-holder').width() < 936 ) {
// 				width = 240; }

// 			if ( !p(this).hasClass('inProgress') ) {
// 				p(this).addClass('inProgress').parent().stop(true,false).animate({ 'width': width }, 300);
// 			}
	
// 			else {
// 				p(this).removeClass('inProgress').parent().stop(true,false).animate({ 'width': 54 }, 300);
// 			}

// 	});


// /*==13.==========================================

// 	B U D D Y P R E S S
// 	BuddyPress fixes

// ===============================================*/

// 	p('body.group-create h1.page-title a').addClass('button').addClass('bp-title-button');


// });