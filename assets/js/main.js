/*! This theme rides a Hoverboard (http://gethoverboard.com/) */
jQuery(function($){

    /*
     * SCREEN SIZE DETECTION FOR JS VIA CSS
     * More info on how this works: http://adactio.com/journal/5429/
     *************************************************************************/
    var size = window.getComputedStyle(document.body,':after')
                .getPropertyValue('content').replace(/\W/g, '');


    /*
     * CUSTOM THEME JS
     *************************************************************************/
    if (size == 'desktop') {
        $('.hero-box>img').parallaxHw(0, -.4);
    }

});

/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
    var $window = $(window);
    var windowHeight = $window.height();

    $window.resize(function () {
        windowHeight = $window.height();
    });

    $.fn.parallaxHw = function(xpos, speedFactor, outerHeight, fade) {
        var $this = $(this);
        var getHeight;
        var firstTop;
        var paddingTop = 0;
        
        //get the starting position of each element to have parallax applied to it      
        $this.each(function(){
            firstTop = $this.offset().top;
        });

        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }
            
        // setup defaults if arguments aren't specified
        if (arguments.length < 1 || xpos === null) xpos = "50%";
        if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
        if (arguments.length < 3 || outerHeight === null) outerHeight = true;
        if (arguments.length < 4 || fade === null) fade = false;
        
        // function to be called whenever the window is scrolled or resized
        function update(){
            var pos = $window.scrollTop();              

            $this.each(function(){
                var $element = $(this);
                var top = $element.offset().top;
                var height = getHeight($element);

                // Check if totally above or totally below viewport
                if (top + height < pos || top > pos + windowHeight) {
                    return;
                }

                $this.css('-webkit-transform', 'translate3d(0px, ' + (Math.round((firstTop - pos) * speedFactor)) + 'px, 0px)');
                $this.css('transform', 'translate3d(0px, ' + (Math.round((firstTop - pos) * speedFactor)) + 'px, 0px)');
                if (fade == 'home') {
                    $this.css('opacity', 1.5 - ((Math.round((firstTop - pos) * speedFactor))/100));
                    // specific to bandana
                    $('#hero img').css('opacity', 1.65 - ((Math.round((firstTop - pos) * speedFactor))/100));
                }
                if (fade == 'single') {
                    $this.css('opacity', 1.3 - ((Math.round((firstTop - pos) * speedFactor))/100));
                    // specific to bandana
                }
            });
        }       
        $window.bind('scroll', update).resize(update);
        update();
    };
})(jQuery);
