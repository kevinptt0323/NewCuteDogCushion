#first argument is username , second argument is passwd
<?php
function login($username,$passwd)
{
    $cmd=shell_exec("curl -b cookie -c cookie -e ncdc.nctucs.net http://ncdc.nctucs.net/adv,/cgi-bin/weblogin.cgi?username=$username&password=$passwd");
    echo $cmd;
}
?>
