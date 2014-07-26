
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

// analytics
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30391088-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();