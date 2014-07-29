<?php get_header()?>
<body <?php body_class();?> id="mobile">
<?php
/*include 'mobiledetector.php';
$detect = new Mobile_Detect;

if ($detect->isMobile() ){?>
	
	

<?php }else{?>

	<meta http-equiv="refresh" content="0; url=http://google.com/" />

<?php }*/?>
<style type="text/css">
	.container{max-width:480px !important;}
	body{ background-image:url(<?php bloginfo('template_directory')?>/images/bgmobile.png)}
	.logo{ margin-top:25px; margin-bottom:25px;}
	.escena2, .escena3, .escena4, .escena5, .escena6, .escena7, .escena8, .escena9, .escena10 { top:0px;}
	#edad { width:290px !important; background-image: url(<?php bloginfo('template_directory')?>/images/edadmobile.png) !important}
	input:focus::-webkit-input-placeholder { color:transparent; }
	input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
	input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
</style>

<div id="main">
	<div class="container">
		<div class="row">
			<div class="logo">
				<img src="<?php bloginfo('template_directory')?>/images/mobiletop.png" alt="" />
			</div>
			
			<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.escena1 a').click(function(event) {
					$('.logo').fadeOut('fast')
				});
			});
			</script>
			
			<div class="logoapp">
				<div class="col-md-8 col-md-offset-2">
					<a href="<?php bloginfo('url')?>" class="">
						<img src="<?php bloginfo('template_directory')?>/images/logoapp.png" width="100%" alt="" />
					</a>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="escena1">
				<div class="col-md-6 col-md-offset-3"><h2>Vuelve a ser niño esta semana y juega recordando a quienes animaron tu niñez</h2></div>
				<div class="clear"></div>
							
				
				<a href="#" class="facebookmg" style="padding:5px 0"><img src="<?php bloginfo('template_directory')?>/images/siguiente.png" alt="" /></a>
				
			</div>
			
			<div class="escena2 col-md-8 col-md-offset-2">
				
				<div>
					<p><strong>Para comenzar</strong><br>ingresa tu año de nacimiento</p>
				</div>
				<input name="edad" id="edad" placeholder="ej: 1984" type="text" />
				
				<div class="alerta"></div>
				
				<div class="jugar"><img src="<?php bloginfo('template_directory')?>/images/jugar.png" alt="" width="180" /></div>
			</div>
			
			
			<div class="escena3 col-md-8 col-md-offset-2">
			<div class="row">	
				<div class="markers">
				
					<div class="col-md-4 col-xs-6 nnpregunta"><div class="npregunta"></div></div>
					
					<div class="col-md-8 col-xs-12 volviste">
						<h1>¡Felicitaciones!</h1>
						<p>Volviste a ser niño durante:</p>
					</div>
					<div class="col-md-4 relleno"></div>
					<div class="col-md-4 col-xs-6"><div class="reloj"><div id="reloj">00:00</div></div></div>
					<div class="clear"></div>
				
				</div>				
				<div class="clear"></div>				
				<?php //repetir segun rangos etareos//?>
				<div class="preguntas etareo1">
					<?php $preguntas = get_posts(array('post_type' => 'preguntas' , 'posts_per_page' => 5 , 'edades' => 'ano-85-a-nn' , 'orderby' => 'rand'))?>
					<?php $count = 0;?>
					<?php foreach ($preguntas as $pregunta):?>
					<?php $count++?>
					<div class="pregunta-<?php echo $count?> pregunta">
						<div class="col-md-6">
						<div class="separator clear"></div>
						<?php echo get_the_post_thumbnail($pregunta->ID , 'thumbnailx')?>
						<div class="separator clear"></div>
						</div>
						<?php $personajes = get_field('personajes' , $pregunta->ID)?>
						<?php $correcta = get_field('correcta' , $pregunta->ID)?>
						
						<div class="col-md-6">
						<div class="row">					
							<?php foreach($personajes as $personaje):?>
								<div class="respuesta respuesta-<?php echo $personaje->ID?> <?php if($personaje->ID == $correcta[0]->ID){echo 'correcta'; }else{echo 'incorrecta';}?>"><span class="fa fa-circle"></span>&nbsp;<?php echo get_the_title($personaje->ID)?></div>
							<?php endforeach;?>
						</div>
						</div>
					<div class="exito"><img src="<?php bloginfo('template_directory')?>/images/siguiente.png" alt="" width="100" style="margin:5px 0"/></div>
					<div class="error"><img src="<?php bloginfo('template_directory')?>/images/error.png" alt="" width="100" style="margin:5px 0"/></div>
					
					<?php if($count<5){?>
					<script type="text/javascript">
						jQuery('.respuesta').click(function(event) {
							jQuery('.respuesta').removeClass('sombrea')
							jQuery(this).addClass('sombrea')
						});
						
						//exito, pasa a la siguiente pregunta
						jQuery('.pregunta-<?php echo $count?> .correcta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .incorrecta').off()
							jQuery('.pregunta-<?php echo $count?> .error').fadeOut('fast')
							jQuery('.pregunta-<?php echo $count?> .exito').show('fast')
						});
						jQuery('.pregunta-<?php echo $count?> .error').click(function(event) {
							jQuery(this).fadeOut('fast')
							jQuery('.respuesta').removeClass('sombrea')
						});
						jQuery('.pregunta-<?php echo $count?> .exito').click(function(event) {
							jQuery(this).parent('.pregunta').fadeOut('fast', function() {
								jQuery(this).next('.pregunta-<?php echo $count+1?>').fadeIn('fast')
								jQuery('.npregunta').css('backgroundPositionY', -<?php echo $count?>00)
							});
						});
						//error, repite
						jQuery('.pregunta-<?php echo $count?> .incorrecta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .error').show('fast')
						});
					</script>
					<?php }elseif($count == 5){?>
					<script type="text/javascript">
						jQuery('.respuesta').click(function(event) {
							jQuery('.respuesta').removeClass('sombrea')
							jQuery(this).addClass('sombrea')
						});
						
						//exito, pasa a la siguiente pregunta
						jQuery('.pregunta-<?php echo $count?> .correcta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .incorrecta').off()
							jQuery('.pregunta-<?php echo $count?> .error').fadeOut('fast')
							jQuery('.pregunta-<?php echo $count?> .exito').show('fast')
						});
						jQuery('.pregunta-<?php echo $count?> .error').click(function(event) {
							jQuery(this).fadeOut('fast')
							jQuery('.respuesta').removeClass('sombrea')
						});
						
						
						/*jQuery('.pregunta-<?php echo $count?> .exito').click(function(event) {
								jQuery('.npregunta').fadeOut('fast')
								jQuery(this).parent('.pregunta').fadeOut('fast', function() {
									jQuery('#reloj').stopwatch().stopwatch('toggle')
									jQuery('.escena4').fadeIn('fast')
								});			
						});*/
						//error, repite
						jQuery('.pregunta-<?php echo $count?> .incorrecta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .error').show('fast')
						});
					</script>	
					<?php }?>	
					</div>
					<?php endforeach;?>
				</div>
				<?php //fin rango etareo acá debiese existir el repetido con un "else"?>
				
				<?php //repetir segun rangos etareos//?>
				<div class="preguntas etareo2">
					<?php $preguntas = get_posts(array('post_type' => 'preguntas' , 'posts_per_page' => 5 , 'edades' => 'ano-75-a-85' , 'orderby' => 'rand'))?>
					<?php $count = 0;?>
					<?php foreach ($preguntas as $pregunta):?>
					<?php $count++?>
					<div class="pregunta-<?php echo $count?> pregunta">
						<div class="col-md-6">
						<div class="separator clear"></div>
						<?php echo get_the_post_thumbnail($pregunta->ID , 'thumbnailx')?>
						<div class="separator clear"></div>
						</div>
						<?php $personajes = get_field('personajes' , $pregunta->ID)?>
						<?php $correcta = get_field('correcta' , $pregunta->ID)?>	
						<div class="col-md-6">	
						<div class="row">				
						<?php foreach($personajes as $personaje):?>
							<div class="respuesta respuesta-<?php echo $personaje->ID?> <?php if($personaje->ID == $correcta[0]->ID){echo 'correcta'; }else{echo 'incorrecta';}?>"><span class="fa fa-circle"></span>&nbsp;<?php echo get_the_title($personaje->ID)?></div>
						<?php endforeach;?>
						</div>
						</div>
					<div class="exito"><img src="<?php bloginfo('template_directory')?>/images/siguiente.png" alt="" width="100" style="margin:5px 0" /></div>
					<div class="error"><img src="<?php bloginfo('template_directory')?>/images/error.png" alt="" width="100" style="margin:5px 0"/></div>
					
					<?php if($count<5){?>
					<script type="text/javascript">
						jQuery('.respuesta').click(function(event) {
							jQuery('.respuesta').removeClass('sombrea')
							jQuery(this).addClass('sombrea')
						});
						
						//exito, pasa a la siguiente pregunta
						jQuery('.pregunta-<?php echo $count?> .correcta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .incorrecta').off()
							jQuery('.pregunta-<?php echo $count?> .error').fadeOut('fast')
							jQuery('.pregunta-<?php echo $count?> .exito').show('fast')
						});
						jQuery('.pregunta-<?php echo $count?> .error').click(function(event) {
							jQuery(this).fadeOut('fast')
							jQuery('.respuesta').removeClass('sombrea')
						});
						jQuery('.pregunta-<?php echo $count?> .exito').click(function(event) {
							jQuery(this).parent('.pregunta').fadeOut('fast', function() {
								jQuery(this).next('.pregunta-<?php echo $count+1?>').fadeIn('fast')
								jQuery('.npregunta').css('backgroundPositionY', -<?php echo $count?>00)
							});
						});
						//error, repite
						jQuery('.pregunta-<?php echo $count?> .incorrecta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .error').show('fast')
						});
					</script>
					<?php }elseif($count == 5){?>
					<script type="text/javascript">
						jQuery('.respuesta').click(function(event) {
							jQuery('.respuesta').removeClass('sombrea')
							jQuery(this).addClass('sombrea')
						});
						
						//exito, pasa a la siguiente pregunta
						jQuery('.pregunta-<?php echo $count?> .correcta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .incorrecta').off()
							jQuery('.pregunta-<?php echo $count?> .error').fadeOut('fast')
							jQuery('.pregunta-<?php echo $count?> .exito').show('fast')
						});
						jQuery('.pregunta-<?php echo $count?> .error').click(function(event) {
							jQuery(this).fadeOut('fast')
							jQuery('.respuesta').removeClass('sombrea')
						});
						
						
						/* jQuery('.pregunta-<?php echo $count?> .exito').click(function(event) {
								jQuery('.npregunta').fadeOut('fast')
								jQuery(this).parent('.pregunta').fadeOut('fast', function() {
									jQuery('#reloj').stopwatch().stopwatch('toggle')
									jQuery('.escena4').fadeIn('fast')
								});			
						}); */
						//error, repite
						jQuery('.pregunta-<?php echo $count?> .incorrecta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .error').show('fast')
						});
					</script>	
					<?php }?>	
					</div>
					<?php endforeach;?>
				</div>
				<?php //fin rango etareo acá debiese existir el repetido con un "else"?>
				
				<?php //repetir segun rangos etareos//?>
				<div class="preguntas etareo3">
					<?php $preguntas = get_posts(array('post_type' => 'preguntas' , 'posts_per_page' => 5 , 'edades' => 'ano-65-a-75' , 'orderby' => 'rand'))?>
					<?php $count = 0;?>
					<?php foreach ($preguntas as $pregunta):?>
					<?php $count++?>
					<div class="pregunta-<?php echo $count?> pregunta">
						<div class="col-md-6">
						<div class="separator clear"></div>
						<?php echo get_the_post_thumbnail($pregunta->ID , 'thumbnailx')?>
						<div class="separator clear"></div>
						</div>
						<?php $personajes = get_field('personajes' , $pregunta->ID)?>
						<?php $correcta = get_field('correcta' , $pregunta->ID)?>	
						<div class="col-md-6">
						<div class="row">					
						<?php foreach($personajes as $personaje):?>
							<div class="respuesta respuesta-<?php echo $personaje->ID?> <?php if($personaje->ID == $correcta[0]->ID){echo 'correcta'; }else{echo 'incorrecta';}?>"><span class="fa fa-circle"></span>&nbsp;<?php echo get_the_title($personaje->ID)?></div>
						<?php endforeach;?>
						</div>
						</div>
					<div class="exito"><img src="<?php bloginfo('template_directory')?>/images/siguiente.png" alt="" width="100" style="margin:5px 0"/></div>
					<div class="error"><img src="<?php bloginfo('template_directory')?>/images/error.png" alt="" width="100" style="margin:5px 0"/></div>
					
					<?php if($count<5){?>
					<script type="text/javascript">
						jQuery('.respuesta').click(function(event) {
							jQuery('.respuesta').removeClass('sombrea')
							jQuery(this).addClass('sombrea')
						});
						
						//exito, pasa a la siguiente pregunta
						jQuery('.pregunta-<?php echo $count?> .correcta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .incorrecta').off()
							jQuery('.pregunta-<?php echo $count?> .error').fadeOut('fast')
							jQuery('.pregunta-<?php echo $count?> .exito').show('fast')
						});
						jQuery('.pregunta-<?php echo $count?> .error').click(function(event) {
							jQuery(this).fadeOut('fast')
							jQuery('.respuesta').removeClass('sombrea')
						});
						jQuery('.pregunta-<?php echo $count?> .exito').click(function(event) {
							jQuery(this).parent('.pregunta').fadeOut('fast', function() {
								jQuery(this).next('.pregunta-<?php echo $count+1?>').fadeIn('fast')
								jQuery('.npregunta').css('backgroundPositionY', -<?php echo $count?>00)
							});
						});
						//error, repite
						jQuery('.pregunta-<?php echo $count?> .incorrecta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .error').show('fast')
						});

					</script>
					<?php }elseif($count == 5){?>
					<script type="text/javascript">
						//exito, pasa a la siguiente pregunta
						
						jQuery('.respuesta').click(function(event) {
							jQuery('.respuesta').removeClass('sombrea')
							jQuery(this).addClass('sombrea')
						});
						
						//exito, pasa a la siguiente pregunta
						jQuery('.pregunta-<?php echo $count?> .correcta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .incorrecta').off()
							jQuery('.pregunta-<?php echo $count?> .error').fadeOut('fast')
							jQuery('.pregunta-<?php echo $count?> .exito').show('fast')
						});
						jQuery('.pregunta-<?php echo $count?> .error').click(function(event) {
							jQuery(this).fadeOut('fast')
							jQuery('.respuesta').removeClass('sombrea')
						});
						
						
						/* jQuery('.pregunta-<?php echo $count?> .exito').click(function(event) {
								jQuery('.npregunta').fadeOut('fast')
								jQuery(this).parent('.pregunta').fadeOut('fast', function() {
									jQuery('#reloj').stopwatch().stopwatch('toggle')
									jQuery('.escena4').fadeIn('fast')
								});			
						}); */
						//error, repite
						jQuery('.pregunta-<?php echo $count?> .incorrecta').click(function(event) {
							jQuery('.pregunta-<?php echo $count?> .error').show('fast')
						});
					</script>	
					<?php }?>	
					</div>
					<?php endforeach;?>
				</div>
				<?php //fin rango etareo acá debiese existir el repetido con un "else"?>
				
				</div>
			</div>
			<div class="clear"></div>
			<div class="escena4 col-md-8 col-md-offset-2">
				<p style="margin-top:10px">porque has vuelto a tu infancia,</p>
				<div class="lobster"><img src="<?php bloginfo('template_directory')?>/images/feliz.png" alt="" width="100%" /></div>
				<a href="https://www.facebook.com/CuprumAFP" data-image="<?php bloginfo('template_directory')?>/screenshot.png" data-title="YO TAMBIEN CELEBRO EL DÍA DEL NIÑO" data-desc="Con Curpum AFP volví a mi infancia jugando y recordando los personajes que animaron mi infancia." class="btnShare" ><img src="<?php bloginfo('template_directory')?>/images/compartir.png" alt="" style="margin-bottom:10px;"></a>
			</div>
			
			
			
			<script type="text/javascript">
			
			window.fbAsyncInit = function(){
			FB.init({
				appId: '1510090219206225', status: true, cookie: true, xfbml: true }); 
			};
			(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];if   (d.getElementById(id)) {return;}js = d.createElement('script'); js.id = id; js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
			function postToFeed(title, desc, url, image){
			var obj = {method: 'feed',link: url, picture: '<?php bloginfo('template_directory')?>/screenshot.png',name: title,description: desc};
			function callback(response){}
			FB.ui(obj, callback);
			}
			
			
			jQuery('.btnShare').click(function(){
			elem = jQuery(this);
			postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));
			
			return false;
			});
			
			
			</script>
			
		</div>
	</div>
</div>




<?php get_footer()?>