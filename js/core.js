/*jshint eqnull:true */
/*!
* jQuery Cookie Plugin v1.1
* https://github.com/carhartl/jquery-cookie
*
 * Copyright 2011, Klaus Hartl
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.opensource.org/licenses/GPL-2.0
 */
(function($, document) {

var pluses = /\+/g;
function raw(s) {
    return s;
}
function decoded(s) {
    return decodeURIComponent(s.replace(pluses, ' '));
}

$.cookie = function(key, value, options) {

    // key and at least value given, set cookie...
    if (arguments.length > 1 && (!/Object/.test(Object.prototype.toString.call(value)) || value == null)) {
        options = $.extend({}, $.cookie.defaults, options);

        if (value == null) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=', options.raw ? value : encodeURIComponent(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path    ? '; path=' + options.path : '',
            options.domain  ? '; domain=' + options.domain : '',
            options.secure  ? '; secure' : ''
        ].join(''));
    }

    // key and possibly options given, get cookie...
    options = value || $.cookie.defaults || {};
    var decode = options.raw ? raw : decoded;
    var cookies = document.cookie.split('; ');
    for (var i = 0, parts; (parts = cookies[i] && cookies[i].split('=')); i++) {
        if (decode(parts.shift()) === key) {
            return decode(parts.join('='));
        }
    }
    return null;
};

  $.cookie.defaults = {};

   })(jQuery, document);



jQuery(document).ready(function($) {
	
	jQuery('.logoapp').animate({opacity: 1, top: 0}, 500, 'swing',  function() {
		  jQuery('.mano').animate({opacity:1}, 500, function() {
		    // stuff to do after animation is complete
		  })
	})
	
	jQuery('.facebookmg').click(function(event) {
		event.preventDefault();
		jQuery('.escena1').fadeOut('fast', function() {
			jQuery('.logoapp').animate({top: -150}, 500)
			jQuery('.escena2').delay(100).fadeIn('fast')
		});
		
	});
	
	
	
	
	jQuery('.jugar').click(function(event) {
		
		
		//jQuery('.escena2').fadeOut('fast', function() {
			//jQuery('.escena3').fadeIn('fast')
			
			var edad = $('#edad').val();
			
			if(edad >= 1985 && edad <= 2012){
				jQuery('.escena2').fadeOut('fast', function() {
					jQuery('.escena3').fadeIn('fast')
					jQuery('.etareo1').css('display', 'block')
					jQuery('#reloj').stopwatch().stopwatch('start');										
				});						
			}
			
			else if(edad <= 1984 && edad >= 1975){
				jQuery('.escena2').fadeOut('fast', function() {
					jQuery('.escena3').fadeIn('fast')
					jQuery('.etareo2').css('display', 'block')
					jQuery('#reloj').stopwatch().stopwatch('start');										
				});
			}
			
			else if(edad <= 1974 && edad >= 1920){
				jQuery('.escena2').fadeOut('fast', function() {
					jQuery('.escena3').fadeIn('fast')
					jQuery('.etareo3').css('display', 'block')
					jQuery('#reloj').stopwatch().stopwatch('start');										
				});
			}
			
			else if(edad >= 2012){
				jQuery(".alerta").html('<div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Atención!</strong> Revisa bien, sabemos que no quieres decirnos tu edad, pero debes hacerlo para jugar, ingresa tu año de nacimiento.</div>')
			}
			
			else{
				jQuery(".alerta").html('<div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Atención!</strong> Revisa bien, sabemos que no quieres decirnos tu edad, pero debes hacerlo para jugar, ingresa tu año de nacimiento.</div>')
			}
			
			
		//});		
	});	
	
	
	jQuery('.pregunta-5 .exito').click(function(event) {
		jQuery('.npregunta').fadeOut('fast')
		jQuery('.nnpregunta').fadeOut('fast')
		jQuery('.relleno').fadeOut('fast')
		jQuery(this).parent('.pregunta').fadeOut('fast', function() {
			jQuery('#reloj').stopwatch().stopwatch('toggle')
			jQuery('.volviste').fadeIn('fast')
			jQuery('.escena4').fadeIn('fast')
			
		});			
	});
	
	
});