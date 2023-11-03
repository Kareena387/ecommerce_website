<?php
session_start();
include '../connect.php';

if(isset($_SESSION['cart'])){
    $uniqid = uniqid();
    $userid = $user['id'];
    $subtotal = $_POST['subtotal'];
    $tax = $_POST['tax'];
    $discount = $_POST['discount'];
    $total = $_POST['total'];
    $payment_method = $_POST['payment_method'];
    $sql = "INSERT INTO orders (user_id, order_id, sub_total, discount, tax, total, payment_method)
        VALUES ('$userid', '$uniqid', '$subtotal', '$discount', '$tax', '$total','$payment_method')";
        if($conn->query($sql) ===  TRUE){
            $order_id = $conn->insert_id;
            foreach($_SESSION['cart'] as $key=>$eachCart){
                $product_id = $eachCart['product_id'];
                $quantity = $eachCart['quantity'];
                $rate = $eachCart['rate'];
                $sql="INSERT INTO order_details (order_id, product_id, quantity, rate)
                VALUES ('$order_id','$product_id','$quantity','$rate')";
                $conn->query($sql);
            }
            unset($_SESSION['cart']);
        header('location: index.php');    
        echo "Data insert successsfully";
        }else{
            echo "Data insert Failed.";
        }
}else{
    echo "<script>alert('No data Found')</script>";
}

echo "<script>history.back();</script>";
?>