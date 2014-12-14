<?php
//first argument is username , second argument is passwd
function login($username,$passwd)
{
    $username=escapeshellcmd($username);
    $passwd=escapeshellcmd($passwd);
    $aa=passthru("sh login.sh $username $passwd");
    echo $aa;
}
if( !isset($_POST['username']) || !isset($_POST['password']) )
    die();
$username=$_POST['username'];
$passwd=$_POST['password'];
login($username,$passwd);
?>
