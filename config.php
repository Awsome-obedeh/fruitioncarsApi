<?php
    function cors(){
        
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS,PUT,DELETE");
    header("Access-Control-Allow-Headers: Authorization, Content-Type");
    header('Content-Type: application/json');

    }

    function jwtSecret(){
        return [
            'jwt_secret'=> 'Awsome'
        ];
    }

?>