<?php
   function cors() {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Allow all origins, or set specific origins
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header("Vary: Origin"); // Helps with caching in proxies
    } else {
        header("Access-Control-Allow-Origin: *");
    }

    // Allow common HTTP methods
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

    // Allow specific headers
    header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");

    // Allow credentials if needed (e.g., for cookies or authentication tokens)
    header("Access-Control-Allow-Credentials: true");

    // Handle preflight requests
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    header('Content-Type: application/json');
}

    function jwtSecret(){
        return [
            'jwt_secret'=> 'Awsome'
        ];
    }

?>