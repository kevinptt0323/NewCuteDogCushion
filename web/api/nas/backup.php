<?php
	if( isset($_GET['url']) ) $url = $_GET['url'];
	else $url=$_POST['url'];
    $url=escapeshellcmd($url);
    $file=system("/bin/sh backup.sh $url");
    echo $file;
    $result=passthru("env sh uploader.sh /photo/facebook $file");
    system("env rm -f tmp/*");
?>
