<?php
	include_once 'src/Google_Client.php';
	include_once 'src/contrib/Google_Oauth2Service.php';
	
	// Edit Following 3 Lines
	$clientId = '771645586800-0tuhnue7mrupue31c1v0mahpei9hgfcs.apps.googleusercontent.com'; //Application client ID
	$clientSecret = 'B_DuJKTZe5UBoEk45HX5im4v'; //Application client secret
	$redirectURL = 'http://localhost:8999/duan/Social_Login/'; //Application Callback URL
	
	$gClient = new Google_Client();
	$gClient->setApplicationName('Your Application Name');
	$gClient->setClientId($clientId);
	$gClient->setClientSecret($clientSecret);
	$gClient->setRedirectUri($redirectURL);
	$google_oauthV2 = new Google_Oauth2Service($gClient);
?>