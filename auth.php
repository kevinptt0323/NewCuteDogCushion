<?php
define('FACEBOOK_SDK_V4_SRC_DIR', '/facebook/php-sdk-v4/src/Facebook/');
require __DIR__ . '/facebook/php-sdk-v4/autoload.php' ;

use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
FacebookSession::setDefaultApplication('370119299832796', 'af025cd05a4c16d3cb941b77f84f973a');

if($session) {

  try {

    $user_profile = (new FacebookRequest(
      $session, 'GET', '/me'
    ))->execute()->getGraphObject(GraphUser::className());

    echo "Name: " . $user_profile->getName();

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }

}
?>
