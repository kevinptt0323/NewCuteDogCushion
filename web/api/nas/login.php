<?php
function login($username,$password)
{
	$url=curl_init("http://ncdc.nctucs.net/adv,/cgi-bin/weblogin.cgi?password=$password&username=$username");
	$response=curl_exec($url);
	curl_close($url);
}
if( isset($_POST['username']) && isset($_POST['password']) ) {
	login($_POST['username'], $_POST['password']);
}
?>
