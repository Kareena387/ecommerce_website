<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST['add_to_cart'])){
        $p_id = $_POST['p_id'];
        $p_name = $_POST['p_name'];
        $rate = $_POST['rate'];
        $quantity = $_POST['quantity'];
        if(isset($_SESSION['cart'])){
            $name_array = array_column($_SESSION['cart'], 'product_id');
            if(in_array($p_id, $name_array)){
                echo "<script>
                alert('product aready added');
                </script>
                ";
                
            }else{
                $index = count($_SESSION['cart']);
                $_SESSION['cart'][$index] = array('product_id'=>$p_id,'product_name'=>$p_name, 'rate'=>$rate,'quantity'=>$quantity);
            }
            
        }else{
            $_SESSION['cart'][0] = array('product_id'=>$p_id,'product_name'=>$p_name, 'rate'=>$rate,'quantity'=>$quantity);
        }
    }
    if(isset($_POST['delet_cart'])){
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['product_id'] == $_POST['product_id']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                    alert('product removed');
                    </script>
                    ";
            }
        }
    }
    echo "<script>history.back();</script>";
}

?>