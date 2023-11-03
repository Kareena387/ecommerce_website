<?php 
include_once '../connect.php'; // conneect database
if($user['role']!="admin"){
    header('location:../frontend/index.php');
}
?>