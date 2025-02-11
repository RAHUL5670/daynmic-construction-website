<?php
$conn = new mysqli('localhost', 'root', '', 'construction');

// Check connection

if($conn){
    // die(mysaqli_error($con));
     echo "Connection Successful";
}else{
    die(mysaqli_error($conn));
}

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }