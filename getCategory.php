<?php
    require "dbConnect.php";
    require "config.php";
    cors();

    $get_cat_sql="SELECT name FROM category";
    $get_cat_query=mysqli_query($conn,$get_cat_sql);
    if($get_cat_query){
        while ($row = mysqli_fetch_assoc($get_cat_query)) {
            $cat[] = $row; // Append each row to the array
        }
      
        echo json_encode([
            "status"=>200,
            "category"=>$cat
        ]);
    }
    


?>