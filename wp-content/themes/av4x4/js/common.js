jQuery( ".our_service_btn,.menu-item-has-children" )
    .mouseover(function() {
        jQuery(this).find( "ul.menu_dropdown" ).show();
    })
    .mouseout(function() {
        jQuery(this).find( "ul.menu_dropdown" ).hide();
});


jQuery('span.header_toggle_icon').on('click',function(e){
    jQuery('.header_menu ul.main_menu').slideToggle();
});
jQuery(document).ready(function() {
    var pakages_section_left_height = jQuery('.view_pakages_section .left_block').outerHeight();
    jQuery('.view_pakages_section .right_block').css('height', pakages_section_left_height);

    var narrow_block_left_height = jQuery('.full_narrow_block .left_block').outerHeight();
    jQuery('.full_narrow_block .right_block').css('height', narrow_block_left_height);

    var header_text_block_height = jQuery('.header_bottom_section .text_section').outerHeight();
    jQuery('.header_bottom_section .button_section').css('height', header_text_block_height);
});
jQuery( window ).resize(function() {
    var pakages_section_left_height = jQuery(' .view_pakages_section .left_block').outerHeight();
    jQuery('.view_pakages_section .right_block').css('height',pakages_section_left_height);

    var narrow_block_left_height = jQuery('.full_narrow_block .left_block').outerHeight();
    jQuery('.full_narrow_block .right_block').css('height', narrow_block_left_height);

    var header_text_block_height = jQuery('.header_bottom_section .text_section').outerHeight();
    jQuery('.header_bottom_section .button_section').css('height', header_text_block_height);
});

var pakages_section_left_height = jQuery('.view_pakages_section .left_block').outerHeight();
jQuery('.view_pakages_section .right_block').css('height', pakages_section_left_height);

var narrow_block_left_height = jQuery('.full_narrow_block .left_block').outerHeight();
jQuery('.full_narrow_block .right_block').css('height', narrow_block_left_height);

var header_text_block_height = jQuery('.header_bottom_section .text_section').outerHeight();
jQuery('.header_bottom_section .button_section').css('height', header_text_block_height);

jQuery('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 170,
    itemMargin: 20,
    asNavFor: '#slider'
});

jQuery('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
});
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

