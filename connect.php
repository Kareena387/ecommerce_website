<?php

$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'ecommerce';

$conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
if($conn->connect_error){
    die('Connection Failed');
}

// used for submenu and sidemenu
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    $sql = "SELECT id, full_name, image, email FROM users where email = '$email'";
    $result = $conn->query($sql);
    $user = $result -> fetch_assoc();
}


?>