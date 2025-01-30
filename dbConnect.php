<?php
   define('HOST','localhost');
   define('DB_USER','root');
   define('PASSWORD','');
   define('DB_NAME','frutioncars');

//    craete database connection
$conn=new mysqli(HOST,DB_USER,PASSWORD,DB_NAME);
    if($conn->connect_error){
        die('Could not Connect ' . mysqli_connect_errno());
    }
    
?>