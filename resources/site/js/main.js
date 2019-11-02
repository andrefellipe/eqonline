// Function to scroll to certain element after clicking a link
// Handle links with @href started with '#' only
$(document).on('click', 'a[href^="#"]', function(e) {
    // Target element id
    var id = $(this).attr('href');

    const $navbar = $('.navbar');

    // Target element
    var $id = $(id);
    if ($id.length === 0) {
        return;
    }

    // Prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // Top position relative to the document
    var pos = $id.offset().top - $navbar.outerHeight();

    // Animated top scrolling
    $('body, html').animate({scrollTop: pos}, 1000);
});

// Function to close the toggler after touching the hamburger icon
$(function() {
    $('.nav a').on('click', function(){ 
        if($('.navbar-toggler').css('display') !='none'){
            $('.navbar-toggler').trigger( "click" );
        }
    });
});