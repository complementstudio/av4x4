
$( ".our_service_btn,ul.menu_dropdown" )
    .mouseover(function() {
        $( "ul.menu_dropdown" ).show();
    })
    .mouseout(function() {
        $( "ul.menu_dropdown" ).hide();
});


$('span.header_toggle_icon').on('click',function(e){
    $('.header_menu ul.main_menu').slideToggle();
});
$(document).ready(function() {
    var pakages_section_left_height = $('.view_pakages_section .left_block').outerHeight();
    $('.view_pakages_section .right_block').css('height', pakages_section_left_height);

    var narrow_block_left_height = $('.full_narrow_block .left_block').outerHeight();
    $('.full_narrow_block .right_block').css('height', narrow_block_left_height);

    var header_text_block_height = $('.header_bottom_section .text_section').outerHeight();
    $('.header_bottom_section .button_section').css('height', header_text_block_height);
});
$( window ).resize(function() {
    var pakages_section_left_height = $(' .view_pakages_section .left_block').outerHeight();
    $('.view_pakages_section .right_block').css('height',pakages_section_left_height);

    var narrow_block_left_height = $('.full_narrow_block .left_block').outerHeight();
    $('.full_narrow_block .right_block').css('height', narrow_block_left_height);

    var header_text_block_height = $('.header_bottom_section .text_section').outerHeight();
    $('.header_bottom_section .button_section').css('height', header_text_block_height);
});

var pakages_section_left_height = $('.view_pakages_section .left_block').outerHeight();
$('.view_pakages_section .right_block').css('height', pakages_section_left_height);

var narrow_block_left_height = $('.full_narrow_block .left_block').outerHeight();
$('.full_narrow_block .right_block').css('height', narrow_block_left_height);

var header_text_block_height = $('.header_bottom_section .text_section').outerHeight();
$('.header_bottom_section .button_section').css('height', header_text_block_height);