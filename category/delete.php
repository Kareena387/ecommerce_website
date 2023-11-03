<?php
session_start();
include_once '../connect.php'; 

$id = $_POST['id'];

$sql = "DELETE FROM categories Where id='$id'";
$conn->query($sql);
header('location:list.php');
?>
