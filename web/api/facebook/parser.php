<?php
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', 'php-sdk-v4/src/Facebook/');
require 'php-sdk-v4/autoload.php' ;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('370119299832796','84b61fca561954af21e3c7b7faba135b');
 $session = new FacebookSession('CAAFQnx1kG9wBAEwoIc9VJONaS61De5VSnBHNbbZCBaTdSWSp4n0wutn8psUL8HcdRKhobXZAO59XZCeMZARAGJyWZC46am42fahdBfA78mxLFbQGyEZBY8juMLBagSTtEH9KkZCiOiwy47fb6H09JoZCHIC09fQmlxoVZAyUM7NdEUQR2JrZADrZAC7CjmsxJYP8jpEZAwUwxoWBHZAY9EUsO1NvL');
$result = array(
  "username"=>"蔡維哲jizz"
);

if($session) {

  try {

    $response=(new FacebookRequest(
      $session, 'GET', '/me/photos?limit=24'
    ))->execute();
    //$object = $response->getGraphObject(GraphUser::className())->asArray();
    $arrayResult = json_decode($response->getRawResponse(), true);
    $arrayResult = $arrayResult['data'];
    $result["row"] = array();
    $result["thumb"] = array();
    foreach($arrayResult as $row){
        array_push($result["row"],$row["images"][0]["source"]);
        array_push($result["thumb"],end($row["images"])["source"]);
    }


  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }
  if( isset($_GET['result']) ) echo json_encode($result);

}

?>
