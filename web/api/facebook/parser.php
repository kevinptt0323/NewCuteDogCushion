<?php
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', 'php-sdk-v4/src/Facebook/');
require 'php-sdk-v4/autoload.php' ;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

if( !isset($_GET['token']) ) {
  echo "{}";
  die();
}

FacebookSession::setDefaultApplication('370119299832796','84b61fca561954af21e3c7b7faba135b');
$session = new FacebookSession($_GET['token']);
$result = array();

if($session) {
  try {

    /* get user name, etc. */
    $response=(new FacebookRequest( $session, 'GET', '/me?fields=id,name' ))->execute();
    $result["profile"] = json_decode($response->getRawResponse(), true);

    /* get photos */
    $response=(new FacebookRequest( $session, 'GET', '/me/photos?limit=24' ))->execute();
    $arrayResult = json_decode($response->getRawResponse(), true);
    $arrayResult = $arrayResult['data'];
    $result["photos"] = array();
    foreach($arrayResult as $row){
      array_push( $result["photos"] , array("raw"=>$row["images"][0]["source"], "thumb"=>end($row["images"])["source"]));
    }

  } catch(FacebookRequestException $e) {
    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();
  }
  echo json_encode($result);
}

?>
