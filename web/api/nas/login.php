<?php
//first argument is username , second argument is passwd
function login($username,$passwd)
{
    $username=escapeshellcmd($username);
    $passwd=escapeshellcmd($passwd);
    $aa=passthru("sh login.sh $username $passwd");
    echo $aa;
}
$username=$_GET['username'];
$passwd=$_GET['password'];
login($username,$passwd);
?>
