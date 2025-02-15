<?php
$headers = apache_request_headers()
    if(isset($headers)){
        // continue
    }
    else{
        http_response_code(400);
        echo json_encode(
            array(
                "msg"=>"Not authorized"
                
                )
                
        )
    }
?>