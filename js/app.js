
// fastclick init
$(function() {
    FastClick.attach(document.body);
});

// hyphrenator run
Hyphenator.run();
document.createElement( "picture" );

/*
Toggles 
*/

// menu toggle
var toggle = $('.st-toggle'),
    offcanvas = $('#st-container');

toggle.on('click', function(event){
    event.preventDefault();
    offcanvas.toggleClass('st-menu-open');
}); 

// $("body").on("swipe",function(){
//   alert('ciao');
// });

// baguette toggle
var baguette = $('#baguette'),
    baguetteTrigger = $('#baguetteButton');

baguetteTrigger.on('click', function(){
    baguette.toggleClass('baguette--open');
});    

// audiomood toggle
var audiomood = $('#audiomood'),
    audiomoodTrigger = $('#audiomoodButton');

audiomoodTrigger.on('click', function(){
    audiomood.toggleClass('audiomood--open');
});