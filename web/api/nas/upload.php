<?php

$file=$_GET['file'];
$escaped_command = escapeshellcmd($file);
$result=passthru("env sh uploader.sh /photo/facebook $file");
echo $result;

?>
