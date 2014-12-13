<?php
function login($username,$password)
{
    $url=curl_init("http://ncdc.nctucs.net/adv,/cgi-bin/weblogin.cgi?password=$password&username=$username");
    $respense=curl_exec($url);
    echo $response;
    curl_close($url);
}
?>
