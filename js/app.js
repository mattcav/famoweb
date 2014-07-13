

// hyphrenator run
Hyphenator.run();
document.createElement( "picture" );


var toggle = $('.st-toggle'),
    offcanvas = $('#st-container');

toggle.on('click', function(event){
    event.preventDefault();
    offcanvas.toggleClass('st-menu-open');
}); 