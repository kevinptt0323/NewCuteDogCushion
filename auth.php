<?php
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', '/home/daniel/projects/NewCuteDogCushion/facebook/php-sdk-v4/src/Facebook/');
require __DIR__ . '/facebook/php-sdk-v4/autoload.php' ;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
//use Facebook\FacebookRedirectLoginHelper;

$appId="370119299832796";
$appSecret="af025cd05a4c16d3cb941b77f84f973a";
$redirect_url="http://mushr00m.nctucs.net/~daniel/ncdc/auth.php";
FacebookSession::setDefaultApplication('370119299832796','af025cd05a4c16d3cb941b77f84f973a');

//$helper = new FacebookRedirectLoginHelper($redirect_url,$appId,$appSecret);

$session=new FacebookSession('CAACEdEose0cBAFs2cbMixZAiwfplSFZBrPwHOZBepajKggbHhvu3r8SPruZAvFk5TaJRQyqQ3b4zLT0f4WfT9u10dEZANiWbhdLJNZAZBtoZAOe9kPtsj9iLwExtQNaIPeO5JyEDOnHnsvkUaaUcQHQZBClMaua2plHuEQMR3ZCg6liZAI8k2ZBLkLswA16MeQZA3uo0RhjIOumLlE7S7ggrqJS4U');


/*try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
 */
if($session){
    try {
        $me = (new FacebookRequest(
            $session, 'GET', '/me'
        ))->execute()->getGraphObject(GraphUser::className());
        echo $me->getName();
    } catch (FacebookRequestException $e) {
        echo $e;
        // The Graph API returned an error
    } catch (\Exception $e) {
        echo $e;
        // Some other error occurred
    }
}/*else{
    echo '<a href="' . $helper->getLoginUrl() . '">Login with Facebook</a>';
}*/

?>
