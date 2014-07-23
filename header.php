<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php if(is_home()){?>
	<title><?php wp_title();?></title>
<?php }else{?>
	<title><?php wp_title();?></title>
<?php }?>

<meta property="og:url" content="<?php bloginfo('url')?>" />
<meta property="og:title" content="ADIVINA EL PERSONAJE" />
<meta property="og:description" content="Vencí el desafío del mes del niño ADIVINA EL PERSONAJE. Te invito a jugar y recordar tu niñez junto a Cuprum AFP" />
<meta property="og:image" content="<?php bloginfo('template_directory')?>/screenshot.png" />
<meta property="og:type" content="game" />
<meta property="og:site_name" content="Adivina el personaje | Cuprum AFP" />
<meta property="fb:app_id" content="1510090219206225" />

<link rel="shortcut icon" href="<?php bloginfo('template_directory')?>/favicon.ico"/>
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory')?>/favicon.png" />

<meta name="viewport" content="width=device-width, initial-scale=0.75 , minimum-scale=1.0 ,  maximum-scale=1.0">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.min.css?ver=3.8.1">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>?ver=3.8.1" />

<!-- FontAwesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>

<!--Otros -->
<?php wp_head()?>

<?php if(is_page('mobile')){?>
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/core2.js"></script>
<?php }elseif(is_page('tab')){?>
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/core1.js"></script>
<?php }else{?>
	<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/core.js"></script>
<?php }?>
<!-- scripts -->
<?php call_scripts()?>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.min.js?ver=3.8.1"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/stopwatch.js"></script>

<?php if(is_page('tab')){?>
<script type="text/javascript">

  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '1510090219206225', // App ID from the App Dashboard
      channelUrl : '//'+window.location.hostname+'/test/', // Channel File for x-domain communication
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });

     /////////////////////////////////////////////////////////////////////////////////////////////
			FB.Event.subscribe('edge.create',function(response) {		   
			      download();			   
			});
			
		    FB.Event.subscribe('auth.authResponseChange', function(response) {
			   
		 		jQuery('.escena1').fadeOut('fast', function() {
					jQuery('.logoapp').animate({top: -150}, 500)
					jQuery('.escena2').delay(100).fadeIn('fast')
				});
                
				FB.api("me/likes/1510090219206225", function(response) {
			      if ( response.data.length == 1 ) {
				 //there should only be a single value inside "data"				 
				  	jQuery('.escena1').fadeOut('fast', function() {
						jQuery('.logoapp').animate({top: -150}, 500)
						jQuery('.escena2').delay(100).fadeIn('fast')
					});
			      } else {
				  
			      }
			  });
                     
		  });
						
		  FB.getLoginStatus(function(response)
		  {
	   
		    if (response.status == 'connected') {
			jQuery('.escena1').fadeOut('fast', function() {
						jQuery('.logoapp').animate({top: -150}, 500)
						jQuery('.escena2').delay(100).fadeIn('fast')
					});
		       
			   FB.api("me/likes/1510090219206225", function(response) {
			      if ( response.data.length == 1 ) { //there should only be a single value inside "data"
				 
				  	jQuery('.escena1').fadeOut('fast', function() {
						jQuery('.logoapp').animate({top: -150}, 500)
						jQuery('.escena2').delay(100).fadeIn('fast')
					});
			      } else {
				 
			      }
			  });
			   
			 
		    } else if (response.status == 'not_authorized') {
			jQuery('.escena1').fadeOut('fast', function() {
						jQuery('.logoapp').animate({top: -150}, 500)
						jQuery('.escena2').delay(100).fadeIn('fast')
					});
			   
			   FB.api("me/likes/1510090219206225", function(response) {
			      if ( response.data.length == 1 ) { //there should only be a single value inside "data"
				 
				  	jQuery('.escena1').fadeOut('fast', function() {
						jQuery('.logoapp').animate({top: -150}, 500)
						jQuery('.escena2').delay(100).fadeIn('fast')
					});
			      } else {
				 
			      }
			  });
			   
		     } else {
			jQuery(".close").css('display', 'none');
			jQuery("#login").fadeIn();
			   
		     }
		});
     

  };
  
  
  function download()
  {
   //jQuery.alert('pico CTM!')
  }
  // Load the SDK's source Asynchronously
  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/es_ES/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document, /*debug*/ false));
</script>

<?php }else{?>

<script type="text/javascript">

  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '1510090219206225', // App ID from the App Dashboard
      channelUrl : '//'+window.location.hostname+'/test/', // Channel File for x-domain communication
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });

     /////////////////////////////////////////////////////////////////////////////////////////////
			FB.Event.subscribe('edge.create',function(response) {		   
			      download();			   
			});
			
		    FB.Event.subscribe('auth.authResponseChange', function(response) {
			   
		 		jQuery("#like").fadeIn();
				jQuery("#login").fadeOut();
                
				FB.api("me/likes/1510090219206225", function(response) {
			      if ( response.data.length == 1 ) {
				 //there should only be a single value inside "data"				 
				  download();
			      } else {
				  
			      }
			  });
                     
		  });
						
		  FB.getLoginStatus(function(response)
		  {
	   
		    if (response.status == 'connected') {
			jQuery("#like").fadeIn();
			jQuery("#login").hide();
		       
			   FB.api("me/likes/1510090219206225", function(response) {
			      if ( response.data.length == 1 ) { //there should only be a single value inside "data"
				 
				  download();
			      } else {
				 
			      }
			  });
			   
			 
		    } else if (response.status == 'not_authorized') {
			jQuery("#like").fadeIn();
			jQuery("#login").hide();
			   
			   FB.api("me/likes/1510090219206225", function(response) {
			      if ( response.data.length == 1 ) { //there should only be a single value inside "data"
				 
				  download();
			      } else {
				 
			      }
			  });
			   
		     } else {
			jQuery("#like").hide();
			jQuery("#login").fadeIn();
			   
		     }
		});
     

  };
  
  
  function download()
  {
   //jQuery.alert('pico CTM!')
  }
  // Load the SDK's source Asynchronously
  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/es_ES/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document, /*debug*/ false));
</script>

<?php }?>
<div id="fb-root"></div>

</head>