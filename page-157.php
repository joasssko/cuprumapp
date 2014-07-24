<?php
session_start();
require_once( 'Facebook/FacebookHttpable.php' );
require_once( 'Facebook/FacebookCurl.php' );
require_once( 'Facebook/FacebookCurlHttpClient.php' );
require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookOtherException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphSessionInfo.php' );

use Facebook\FacebookHttpable;
use Facebook\FacebookCurl;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;

FacebookSession::setDefaultApplication('1510090219206225','35d16851508fcc39cbabdf8180fa6446');

$helper = new FacebookRedirectLoginHelper( 'https://diadelninocuprum.upmedia.cl/?page_id=157' );

// see if a existing session exists
if (isset($_SESSION) && isset($_SESSION['fb_token'])) {
    // create new session from saved access_token
    $session = new FacebookSession($_SESSION['fb_token']);
    // validate the access_token to make sure it's still valid
    try {
        if (!$session->validate()) {
            $session = null;
        }
    } catch (Exception $e) {
        // catch any exceptions
        $session = null;
    }
} else {
    // no session exists
    try {
        $session = $helper->getSessionFromRedirect();
    } catch (FacebookRequestException $ex) {
        // When Facebook returns an error
    } catch (Exception $ex) {
        // When validation fails or other local issues
        echo $ex->message;
    }
}



// see if we have a session
if (isset($session)) {
    // save the session
    $_SESSION['fb_token'] = $session->getToken();
    // create a session using saved token or the new one we generated at login
    $session = new FacebookSession($session->getToken());
    // graph api request for user data
    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request->execute();
    $graphObject = $response->getGraphObject()->asArray();

    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();

    $_SESSION['FB'] = true;

    $_SESSION['usernameFB'] = $graphObject['name'];
    $_SESSION['idFB'] = $graphObject['id'];
    $_SESSION['first_nameFB'] = $graphObject['first_name'];
    $_SESSION['last_nameFB'] = $graphObject['last_name'];
    $_SESSION['genderFB'] = $graphObject['gender'];

    // logout and destroy the session, redirect url must be absolute url
    $linkLogout = $helper->getLogoutUrl($session,
            'http://todaythoughts.com/CS4880FB/redirect.php?action=logout');

    $_SESSION['logoutUrlFB'] = $linkLogout;
    //header('Location: index.php');
	//echo 'compartir';

} else {
    //header('Location: ' . $helper->getLoginUrl());
	echo '<a href="'.$helper->getLoginUrl(array('scope' => 'user_likes')).'">Log In</a>';
}

?>

<?php
        if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
            
            if (isset($_SESSION['FB']) && ($_SESSION['FB'] == true)) {
                // echo FB user info
               ?>
				
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
				<meta property="og:description" content="<?php echo $_SESSION['first_nameFB']?> Venció el desafío y demoró <?php echo $_COOKIE['tiempo']?> en volver a ser niño del niño ADIVINA EL PERSONAJE. Te invito a jugar y recordar tu niñez junto a Cuprum AFP" />
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

				</head>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1510090219206225&version=v2.0";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<body <?php body_class(); ?>>
				
				<div class="container">
					<div class="row">
						<p>Comparte este juego con tus amigos</p>
						<div class="fb-share-button" data-href="<?php echo get_the_permalink($post-ID)?>"></div>
						
					</div>
				</div>
				
				
				<?php 
				get_footer();
				
				$_SESSION['fb_token'] = $session->getToken();
			    // create a session using saved token or the new one we generated at login
			    $session = new FacebookSession($session->getToken());
				
				/* make the API call */
				$request = new FacebookRequest(
				  $session,
				  'GET',
				  '/me'
				);
				$response = $request->execute();
				$graphObject = $response->getGraphObject();
				/* handle the result */
				
				var_dump($graphObject);
				
				
            }
        } else { ;

	
?>

<?php get_header()?>
<body <?php body_class();?>>			
<div class="container" sttle="text-align:center;">
	<div class="row">
		<h1>Lo sentímos<h1>
		<p>Debes conectarte a la aplicación para poder jugar</p>
		
		<a href="<?php echo get_page_link('155')?>"><img src="<?php bloginfo('template-directory') ?>/images/siguiente.png" /></a>
		
	</div>
</div>			
<?php get_footer()?>			
<?php } ?>

<?php // cuprum ID 395624000455504?>
