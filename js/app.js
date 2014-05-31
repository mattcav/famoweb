// foundation init
$(document).foundation();

// hyphrenator run
Hyphenator.run();
document.createElement( "picture" );


// video proportion
var vCanvas = Foundation.utils.S('#video-canvas'),
    vCover = Foundation.utils.S('#video-cover');

var width = $( window ).width(); 
var height = (width * 3) / 7.15;

    console.log(height);

vCanvas.attr('width', width).attr('height', height);
vCover.attr('width', width).attr('height', height);

$(window).resize(function () { 
    vCanvas.attr('width', width).attr('height', height);
    vCover.attr('width', width).attr('height', height); 
});