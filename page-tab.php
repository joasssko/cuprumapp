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
<meta property="og:title" content="YO TAMBIEN CELEBRO EL DÍA DEL NIÑO" />
<meta property="og:description" content="Con Curpum AFP volví a mi infancia jugando y recordando los personajes que animaron mi infancia." />
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
<link href='https://fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>

<!--Otros -->
<?php wp_head()?>
<!-- scripts -->
<?php call_scripts()?>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/core1.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/bootstrap/bootstrap.min.js?ver=3.8.1"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/stopwatch.js"></script>

<div id="fb-root"></div>


<body <?php body_class();?>>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
	  //jQuery('.notlogged').css('display','none')
	  //jQuery('.notconected').css('display','none')
	  //jQuery('.conected').css('display','block')
	  
    } else if (response.status === 'not_authorized') {
		jQuery('.notlogged').css('display','none')
		jQuery('.notconected').css('display','block')
      // The person is logged into Facebook, but not your app.
      //document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      // document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
	  
	  jQuery('.notlogged').css('display','block')
	  
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1510090219206225',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
	//self.location.reload();
  });
		
  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
	
	
	jQuery('.notlogged').css('display','none')
	jQuery('.notconected').css('display','none')
	jQuery('.conected').css('display','block')
	
	/*FB.api('/me/likes/395624000455504', function(response) {
	    console.log(response.data);
	});*/
	
	FB.api(
	    "/me/likes/395624000455504",
	    function (response) {
		 console.log(response);
	      if (response.data.length == 1) {
		        //alert("page liked already");
				//accion para mostrar juego
				
				jQuery('.liked').css('display','block')
	  			//jQuery('.notconected').css('display','none')
				
		      } else {
		        //alert("page is NOT liked ");
				//accion para mostar like button
				
				jQuery('.notliked').css('display','block')
	 			//jQuery('.notconected').css('display','none')
				
		      }
	    }
	);
	
    /*FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });*/
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->



<style type="text/css">
	.container{ width:810px;}
	.volviste{ padding:40px 0;}
	.escena4{ padding: 150px 0 0 0; }
</style>

<div id="status"></div>

<div class="notlogged" style="text-align:center">
	<div class="container">
		<div class="row">
			<div class="logo">
				<img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" width="350" class="alignleft"/>
				
			</div>
			
			<div class="logoapp">
				<div class="col-md-8 col-md-offset-2">
					<img src="<?php bloginfo('template_directory')?>/images/logoapp.png" width="70%" style="margin:0 auto" alt="" />
				</div>
				<div class="clear"></div>
			</div>
			<h1>Lo sentímos</h1>
			<p>Debes Iniciar sesión en facebook para continuar</p>
			
			<fb:login-button scope="public_profile,email,user_likes" data-size="large" data-show-faces="false" data-auto-logout-link="false" data-default-audience="friends" onlogin="checkLoginState();"></fb:login-button>
			
		</div>
	</div>
</div>

<div class="logged">loged</div>

<div class="notconected" style="text-align:center">
	<div class="container">
		<div class="row">
			<div class="logo">
				<img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" width="350" class="alignleft"/>
				
			</div>
			
			<div class="logoapp">
				<div class="col-md-8 col-md-offset-2">
					<img src="<?php bloginfo('template_directory')?>/images/logoapp.png" width="70%" style="margin:0 auto" alt="" />
				</div>
				<div class="clear"></div>
			</div>
			<h1>Lo sentímos</h1>
			<p>Debes conectarte a la app para continuar</p>
			
			<fb:login-button scope="public_profile,email,user_likes" data-size="large" data-show-faces="false" data-auto-logout-link="false" data-default-audience="friends" onlogin="checkLoginState();"></fb:login-button>
			
		</div>
	</div>
</div>

<div class="connected">app conected</div>

<div class="notliked" style="text-align:center">
	<div class="container">
		<div class="row">
			<div class="logo">
				<img src="<?php bloginfo('template_directory')?>/images/logo.png" alt="" width="350" class="alignleft"/>
				
			</div>
			
			<div class="logoapp">
				<div class="col-md-8 col-md-offset-2">
					<img src="<?php bloginfo('template_directory')?>/images/logoapp.png" width="70%" style="margin:0 auto" alt="" />
				</div>
				<div class="clear"></div>
			</div>
			<h1>Lo sentímos</h1>
			<p>Para jugar debes ser fan de Cuprum</p>
			
			<fb:like href="https://www.facebook.com/CuprumAFP" layout="button" action="like" show_faces="false" share="false" onlogin="checkLoginState();" ></fb:like>
			<div class="clear separator"></div>
			<img src="<?php bloginfo('template_directory')?>/images/jugar.png" alt="" class="jugarss" />
			<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('.jugarss').click(function() {
						location.reload();
					});
				}); 
			</script>
		</div>
	</div>
</div>

<div class="liked">
	<?php get_template_part('_page-tab');?>
</div>

<style type="text/css">
.notlogged , 	.logged , .notconected , .connected , .notliked , .liked{ display:none}
</style>

<?php get_footer()?>