<?php
    function upload($file_path)
    {
        echo "<html><form id='fileUploadForm' method='POST' action='http://ncdc.nctucs.net/adv,/cgi-bin/file_upload-cgic' enctype='multipart/form-data'><input type='hidden' name='rformat' value='extjs'/><input type='hidden' name='target_path' value='/Public/'/><input type='hidden' name='file_path' value='";echo $file_path;echo "'/><INPUT type='hidden' name='submit' value='Conitnue'/> </form></html>";
    }
    
?>
