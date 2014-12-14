<?php

$file=$_GET['file'];
$escaped_command = escapeshellcmd($file);
shell_exec("sh upload.sh /photo/facebook $file");

?>
