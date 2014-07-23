jQuery(document).ready(function($) {
	
	jQuery('.logoapp').animate({opacity: 1, top: 0}, 500, 'swing',  function() {
		  jQuery('.mano').animate({opacity:1}, 500, function() {
		  })
	})
	
	jQuery('.facebookmg').click(function(event) {
		event.preventDefault();
		jQuery('.escena1').fadeOut('fast', function() {
			jQuery('.logo').slideUp('fast')
			//jQuery('.logoapp').animate({top: -150}, 500)
			jQuery('.escena2').delay(100).fadeIn('fast')
		});
		
	});
	
	jQuery('.jugar').click(function(event) {
			
			
			
			var edad = $('#edad').val();
			
			if(edad >= 1985 && edad <= 2012){
				jQuery('.escena2').fadeOut('fast', function() {
					jQuery('.logoapp').slideUp('fast')
					jQuery('.escena3').fadeIn('fast')
					jQuery('.etareo1').css('display', 'block')
					jQuery('#reloj').stopwatch().stopwatch('start');										
				});						
			}
			
			else if(edad <= 1984 && edad >= 1975){
				jQuery('.escena2').fadeOut('fast', function() {
					jQuery('.logoapp').slideUp('fast')
					jQuery('.escena3').fadeIn('fast')
					jQuery('.etareo2').css('display', 'block')
					jQuery('#reloj').stopwatch().stopwatch('start');										
				});
			}
			
			else if(edad <= 1974 && edad >= 1920){
				jQuery('.escena2').fadeOut('fast', function() {
					jQuery('.logoapp').slideUp('fast')
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