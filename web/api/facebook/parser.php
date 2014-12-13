<?php
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', 'php-sdk-v4/src/Facebook/');
require 'php-sdk-v4/autoload.php' ;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('370119299832796','84b61fca561954af21e3c7b7faba135b');
 $session = new FacebookSession('CAAFQnx1kG9wBAKlexZBgcbtvGwz8jEYbTNB6qL9ihnU3Vs5N3g8uG9IUCQsNJ2hdQGuQZA2GfzW4TPw4M3drUTBUbyfPgZAFGamNHk30Q0DNsa5terQqh4VSHBEOgYrSVEcgkUbbz18vatvoxy9GrWaDYFHCC9KVrUeQrLaTGCFWwmaIHOO4jJWCgIJ8WFo1lnZAG65RZCJLBDLmC84x5');
$result=array();
$thumbnail=array();

if($session) {

  try {

    $response=(new FacebookRequest(
      $session, 'GET', '/me/photos?limit=24'
    ))->execute();
    //$object = $response->getGraphObject(GraphUser::className())->asArray();
    $arrayResult = json_decode($response->getRawResponse(), true);
    $arrayResult=$arrayResult['data'];
    foreach($arrayResult as $row){
        array_push($result,$row["images"][0]["source"]);
        array_push($thumbnail,end($row["images"])["source"]);
    }


  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }
function result($data)
{
    echo json_encode($data);
}
function thumbnail($data)
{
    echo json_encode($data);
}
if(isset($_GET['result'])) result($result);
else if(isset($_GET['thumb'])) thumbnail($thumbnail);

}

?>
