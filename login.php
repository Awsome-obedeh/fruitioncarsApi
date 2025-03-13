<?php
require __DIR__ . '/vendor/autoload.php';
require "config.php";
require "dbConnect.php";
cors();
// jwt


// use Firebase\JWT\JWT;
// use Firebase\JWT\Key;

// $config = jwtSecret();
// $secret_key = $config['jwt_secret'];

// //  jwt payload
// function jwt_payload($email, $id)
// {
//     $payload = array(
//         'iss' => $id,
//         'iat' => time(),
//         'exp' => strtotime('+2 days'),
//         'email' => $email

//     );
//     return $payload;
// }



cors();


$password = $email = '';
$edata = file_get_contents("php://input");
$data = json_decode($edata, true);
try {



    $email = $data['email'];
    $password = $data['password'];
    // echo json_encode([
    //     "email" => $email,
    //     "password" => $password
    // ]);

    $login_sql = "SELECT * FROM admin WHERE email='$email' && password='$password'";
    $login_query = mysqli_query($conn, $login_sql);


    if ($login_query && mysqli_num_rows($login_query) > 0) {
        $users = mysqli_fetch_assoc($login_query);


        // $id = $users['id'];
        // $email = $users['email'];
        // $jwt = JWT::encode(jwt_payload($email, $id), $secret_key, 'HS256');
        echo json_encode(array("status" => 200, "msg" => "user logged in successfully", "token" => $jwt));
    } else {
        echo json_encode((array("status" => 400, "msg" => "invalid credentials")));
        // echo mysqli_error();
    };
} catch (Exception $err) {
    echo json_encode(array("status" => 500, "msg" => "Server Error"));
    echo $err;
}
