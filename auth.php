<?php
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', '/home/daniel/projects/NewCuteDogCushion/facebook/php-sdk-v4/src/Facebook/');
require __DIR__ . '/facebook/php-sdk-v4/autoload.php' ;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('370119299832796','84b61fca561954af21e3c7b7faba135b');
 $session = new FacebookSession('CAAFQnx1kG9wBACCn39rpRoiw6e2Ole0mNJcxTyGAgAJdfAQ4Ree9DpQpk1GnTH96gglKL1IwqZAG7AVwOyp6B8KVY9NEldJkoRLD4D3PQrW2ZBATw1cbrNyRwB8y1DFxLY7UcjwZAQpvkaZB5CvJybkkWlXvavqhxuyfDBsIib3A0aLEPlA8j42GPsafBFtj34ZAg1yjswWAwoOUT5mZAQ');

if($session) {

  try {

    $me = (new FacebookRequest(
      $session, 'GET', '/me/photos'
    ))->execute()->getGraphObject(GraphUser::className());

    echo var_dump($me);
    echo "Name: " . $me->getName();

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }

}

?>
