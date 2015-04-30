$("#theme-default").click(function() {       $('link[id="theme-change"]').attr({href : "css/style-default.css"});     });
$("#theme-pantone2015").click(function() {       $('link[id="theme-change"]').attr({href : "css/style-pantone2015.css"});     });
$("#theme-pink").click(function() {       $('link[id="theme-change"]').attr({href : "css/style-pink.css"});     });
$("#theme-yellow").click(function() {       $('link[id="theme-change"]').attr({href : "css/style-yellow.css"});     });
$("#theme-green").click(function() {       $('link[id="theme-change"]').attr({href : "css/style-green.css"});     });
$("#theme-pantone2014").click(function() {       $('link[id="theme-change"]').attr({href : "css/style-pantone2014.css"});     });
$("#theme-blue").click(function() {       $('link[id="theme-change"]').attr({href : "css/style-blue.css"});     });
$("#theme-coldgrey").click(function() {       $('link[id="theme-change"]').attr({href : "css/style-coldgrey.css"});     });

$(".color-change div").click(function() {
    $(".color-change div").removeClass( "theme-active" );
    $(this).addClass( "theme-active" );
});

//overlay control
$("#theme-solid").click(function() {
    $(".overlay").addClass( "color-overlay" );
    $(".overlay-sec").addClass( "color-overlay-sec" );
    $(".overlay-change ul li").removeClass( "list-active" );
    $(this).addClass( "list-active" );
});

$("#theme-overlay").click(function() {
    $(".overlay").removeClass( "color-overlay" );
    $(".overlay-sec").removeClass( "color-overlay-sec" );
    $(".overlay-change ul li").removeClass( "list-active" );
    $(this).addClass( "list-active" );
});

//parallax control
$("#theme-noparallax").click(function() {
    $(".parallax").addClass( "stop-parallax" );
    $(".parallax-change ul li").removeClass( "list-active" );
    $(this).addClass( "list-active" );
});

$("#theme-parallax").click(function() {
    $(".parallax").removeClass( "stop-parallax" );
    $(".parallax-change ul li").removeClass( "list-active" );
    $(this).addClass( "list-active" );
});

$(".panel-display").click(function() {
    $(".demo-panel").toggleClass( "panel-show" );
});