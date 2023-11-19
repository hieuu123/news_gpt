<?php 
    $servername = "localhost";
    $dbname = "cmsweb";
    $username = "root";
    $password = "";
                    
     $conn =  new mysqli($servername, $username, $password, $dbname); 
    //kiểm tra kết nối
    if ($conn->connect_error){
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    //else echo "Connect successful !!!!!";
?>            
