<?php
    function upload($file_path)
    {
        $target=('http://ncdc.nctucs.net/adv,/cgi-bin/file_upload-cgic');
        $data=array(
            'rformat' => "extjs",
            'target_path' => "/public",
            'file_path' => "$file_path"
        );
        $options= array(
            'http' => array(
                'id' => "fileUploadForm",
                'method' => "POST",
                'enctype' => "multipart/form-data"0
                'content' => http_build_query(data)
                );
        $context=stream_context_create($options); 
        $result=file_get_contents($target,false,$context);   
        echo $result; 
    }
    
?>
