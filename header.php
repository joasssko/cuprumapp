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

<div id="fb-root"></div>
<script>/*(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=1510090219206225&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));*/</script>

</head>