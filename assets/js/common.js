/**
 * Created by Администратор on 9/14/2016.
 */
//$('.our_service_btn').on('click',function(e){
//    $('ul.menu_dropdown').slideToggle();
//});
$( ".our_service_btn,ul.menu_dropdown" )
    .mouseover(function() {
        $( "ul.menu_dropdown" ).show();
    })
    .mouseout(function() {
        $( "ul.menu_dropdown" ).hide();
});

//$('li a.our_service_btn').hover(function() {
//    $(this).next('ul.menu_dropdown').stop(true, true).delay(500).fadeIn(500);
//}, function() {
//    $(this).next('ul.menu_dropdown').stop(true, true).delay(500).fadeOut(500);
//});


$('span.header_toggle_icon').on('click',function(e){
    $('.header_menu ul.main_menu').slideToggle();
});
$(document).ready(function() {
    var pakages_section_left_height = $('.view_pakages_section .left_block').outerHeight();
    $('.view_pakages_section .right_block').css('height', pakages_section_left_height);
});
$( window ).resize(function() {
    var pakages_section_left_height = $(' .view_pakages_section .left_block').outerHeight();
    $('.view_pakages_section .right_block').css('height',pakages_section_left_height);
});
var pakages_section_left_height = $('.view_pakages_section .left_block').outerHeight();
$('.view_pakages_section .right_block').css('height', pakages_section_left_height);

var narrow_block_left_height = $('.full_narrow_block .left_block').outerHeight();
$('.full_narrow_block .right_block').css('height', narrow_block_left_height);