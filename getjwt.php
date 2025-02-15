<?php

require __DIR__ . '/vendor/autoload.php';
require "config.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$config=jwtSecret();
 $secret_key=$config['jwt_secret'];

//  jwt payload
function jwt_payload($email,$id){
    $payload=array(
        'iss'=> $id,
        'iat'=>time(),
        'email'=>$email,
        'exp'=>strtotime("+1 hour")

    );
    return $payload; 
}

$jwt=JWT::encode(jwt_payload(2,88762), $secret_key,'HS256' );

// echo $jwt,$secret_key;

