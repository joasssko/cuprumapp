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

$helper = new FacebookRedirectLoginHelper( 'https://diadelninocuprum.upmedia.cl/?page_id=153' );

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
} else {
    //header('Location: ' . $helper->getLoginUrl());
	echo '<a href="'.$helper->getLoginUrl().'">Log In</a>';
}

?>

<?php
        if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
            
            if (isset($_SESSION['FB']) && ($_SESSION['FB'] == true)) { 
	
				/* make the API call */
				$request = new FacebookRequest(
				  $session,
				  'GET',
				  '/{user-id}/likes/{page-id}'
				);
				$response = $request->execute();
				$graphObject = $response->getGraphObject();
				/* handle the result */
				
				var_dump($graphObject);
	
	?>
	
               
				


            <?php }
        } else { ;

	
?>

<?php get_header()?>			
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
