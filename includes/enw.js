$(document).ready(function() {
var dthis = $('#logo');
   dthis.css("position","absolute");
    dthis.css("top", (($(window).height() - dthis.outerHeight()) / 2) + 
                                                $(window).scrollTop() + "px");
    dthis.css("left", (($(window).width() - dthis.outerWidth()) / 2) + 
                                                $(window).scrollLeft() + "px");
});
$(window).load(function() {


});
