<?php
include 'mobiledetector.php';
$detect = new Mobile_Detect;

if ($detect->isMobile() ){?>
	
	<meta http-equiv="refresh" content="0; url=<?php echo get_page_link('151')?>" />

<?php }else{?>
<?php get_header()?>
<body <?php body_class();?> >
<div id="main" style="min-height:1000px;">
	<div class="container">
		<div class="row">
			<div class="logo">
				<img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" class="alignleft"/>
				
				<div class="der">
					<div id="like"><fb:like href="<?php bloginfo('url')?>" send="false" width="100" size="xlarge" data-show-faces="false"></fb:like></div>
					<div id="login"><fb:login-button autologoutlink="true" show-faces="false" perms="user_likes" size="xlarge" ></fb:login-button></div>
				</div>
				
			</div>
			
			<div class="logoapp">
				<div class="col-md-8 col-md-offset-2">
					<a href="<?php bloginfo('url')?>" class="">
						<img src="<?php bloginfo('template_directory')?>/images/logoapp.png" width="100%" alt="" />
					</a>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="escena1">
				<div class="col-md-6 col-md-offset-3"><h2>Pon a prueba tu memoria con este entretenido desafío que CuprumAFP tiene para tí en el mes del niño.</h2></div>
				<div class="clear"></div>
							
				
				<a href="#" class="facebookmg"><img src="<?php bloginfo('template_directory')?>/images/siguiente.png" alt="" /></a>
				
			</div>	
		</div>
	</div>
</div>




<?php get_footer()?>
<?php } ?>