/*

	1 - PRIMARY

		1.1 - Action by hover
		1.2 - Span arrow: top level
		1.3 - Span arrow: sub-levels
		1.4 - Action by click (resp)
		1.5 - 3rd level margin
		1.6 - Responsive menu toggle
		1.7 - Flush menu by click
		1.8 - Flush menu by resize

	2 - SECONDARY

		2.1 - Action by hover
		2.2 - Span arrow
		2.3 - 3rd level margin

	3 - CUSTOM MENU

		3.1 - Span sunbline
		3.2 - Span arrow
		3.3 - Current the class
		3.4 - Add class by hover
		3.5 - Action by click

*/

/* jshint -W099 */
/* global jQuery:false */

var m = jQuery.noConflict();

m(function(){

	'use strict';

/*===============================================

	P R I M A R Y
	Primary menu on header

===============================================*/

	/*-------------------------------------------
		1.1 - Action by hover
	-------------------------------------------*/

	m('.menu li:has(ul), .menu-2 li:has(ul)')

		.hover(

			function(){

				var
					width = m('body').width();

					if ( width > 942 ) {

						m(this).addClass('hover-has-ul');
		
						var
							ulFirst = m('ul:first',this),
							height = ulFirst.height();
		
							ulFirst.css({ height: 0, opacity: 1, top: '100%' }).animate({ height: height, opacity: 1 }, 350, function(){ m(this).css({ 'height': 'auto' }); });

					}

			},

			function(){

				var
					width = m('body').width();

					if ( width > 942 ) {

							m(this).removeClass('hover-has-ul');
			
							m('ul', this).stop(true, false).animate({ height: 0, opacity: 0 }, 250, function(){ m(this).css({ top: -9999, height: 'auto'}); });

					}

			}

		);


	/*-------------------------------------------
		1.2 - Span arrow: top level
	-------------------------------------------*/

	m('.menu > li:has(ul)')

		.each(function(){

			m(this).append('<span class="ico-menu-top">&nbsp;</span>');

		})
		
		.addClass('hasUl');


	/*-------------------------------------------
		1.3 - Span arrow: sub-levels
	-------------------------------------------*/

	m('.menu ul li:has(ul)').find('a:first')

		.each(function(){

			var d = '<span class="ico-menu-top">&nbsp;</span>' + m(this).html();

			m(this).html(d);

		});


	/*-------------------------------------------
		1.4 - Action by click (resp)
	-------------------------------------------*/

	m('.menu > li > span.ico-menu-top')

		.click(
			function(){
				/* removed */
			}
		)

		/*-------------------------------------------
			1.4.1 - Add class by hover (resp)
			NOT NECESSARY / Just for resp demo
		-------------------------------------------*/

		.hover(

			function(){

				m(this).parent().addClass('hover-has-ul');

			},

			function(){

				var
					width = m('body').width();

					if ( width < 985 && !m(this).hasClass('clicked') ) {

						m(this).parent().removeClass('hover-has-ul');

					}

			}

		);


	/*-------------------------------------------
		1.5 - 3rd level margin
	-------------------------------------------*/

		m('.menu ul li:has(ul), .menu-2 ul li:has(ul)')
	
			.hover(function(){

				var t = m(this).height() + 5;

				m('ul',this).css({margin: '-' + t + 'px 0 0 0'});

			});


	/*-------------------------------------------
		1.6 - Responsive menu toggle
	-------------------------------------------*/

	m('#menu-select').click(function(){

		if ( m(this).hasClass('resp-menu-opened') ) {

			st_flush_menuByClick();

		}
		else {

			m(this).addClass('resp-menu-opened');
			m('#menu-box').addClass('resp-menu-opened');

			var
				menu = m('#menu-box .menu').html();

				m('#menu-box').append('<ul id="menu-responsive"></ul>');
				m('#menu-responsive').append(menu);
				m('#menu-responsive .sub-menu').removeAttr('style');

				var
					height = m('#menu-responsive').outerHeight(true);

					m('#menu-box').stop(true, false).animate({ height: height }, 1500);

		}

	});


	/*-------------------------------------------
		1.7 - Flush menu by click
	-------------------------------------------*/

	function st_flush_menuByClick() {

		m('#menu-responsive').remove();
		m('#menu-box').stop(true, false).removeAttr('style').removeClass('resp-menu-opened');
		m('#menu-select').removeClass('resp-menu-opened');

	}


	/*-------------------------------------------
		1.8 - Flush menu by resize
	-------------------------------------------*/

	m(window).resize(

		function() {

			if ( m('#layout').width() > 942 ) {
		
				m('#menu-responsive').remove();
				m('#menu-box').stop(true, false).removeAttr('style').removeClass('resp-menu-opened');
				m('#menu-select').removeClass('resp-menu-opened');
	
			}

		}

	);



/*===============================================

	S E C O N D A R Y
	Secondary menu on header

===============================================*/

	/*-------------------------------------------
		2.1 - Action by hover
	-------------------------------------------*/

	// Same as menu-1


	/*-------------------------------------------
		2.2 - Span arrow
	-------------------------------------------*/

	m('.menu-2 li:has(ul)')

		.find('a:first')

			.append('<span>&nbsp;</span>');


	/*-------------------------------------------
		2.3 - 3rd level margin
	-------------------------------------------*/

	// Same as menu-1



/*===============================================

	C U S T O M   M E N U
	Standard widget

===============================================*/

	/*-------------------------------------------
		3.1 - Span sunbline
	-------------------------------------------*/

	m('.widget_custom_menu > li > a, .widget_custom_menu > li > ul > li > a').each(function(){

		var
			title = m(this).attr('title');

			if ( title ) {
				m(this).append('<span class="subline">' + title + '</span>').removeAttr('title'); }

	});

	/*-------------------------------------------
		3.2 - Span arrow
	-------------------------------------------*/

	m('.widget_custom_menu > li:has(ul)').append('<span>&nbsp;</span>');


	/*-------------------------------------------
		3.3 - Current the class
	-------------------------------------------*/

	m('.widget_custom_menu > li.current-menu-ancestor:has(ul)').addClass('stCurrent');


	/*-------------------------------------------
		3.4 - Add class by hover
	-------------------------------------------*/

	m('.widget_custom_menu span')

		.hover(

			function(){

				m(this).parent().addClass('wHover');

			},

			function(){

				m(this).parent().removeClass('wHover');

			}

		);


	/*-------------------------------------------
		3.5 - Action by click
	-------------------------------------------*/

	m('.widget_custom_menu span').click(function(){

		var
			parent = m(this).parent(),
			menu = m(this).prev();

			if ( m(parent).hasClass('stCurrent') ) {

				m(menu)
					.stop(true, false)
					.animate({ 'height': 0 }, 400,

						function(){
							m(menu).removeAttr('style');
							m(parent).removeClass('stCurrent');
						}

					);

			}

			else {

				m(parent).addClass('stCurrent');

				m(menu).css({ 'display': 'block' });

				var
					height = m(this).prev().outerHeight(true);

					m(menu)
						.css({ 'height': 0 })
						.stop(true, false)
						.animate({ 'height': height }, 400,
	
							function(){
								m(menu).removeAttr('style');
							}

						);

			}

	});


});