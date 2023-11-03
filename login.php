<?php
session_start();
if(isset($_SESSION['email'])){
    header('location:home.php');
}
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    
    $result = $conn->query($sql);
    $user = $result -> fetch_assoc();
    
    if($result && $result->num_rows > 0){
        if(password_verify($password, $user['password'])){
            $_SESSION['email'] = $email;
            header('location:home.php');
        }else{
            echo "Invalid Password.";
        }
               
    }else{
        echo "Email not Found.";
    }
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <title>First page</title>
    </head>
    <body>
        <h1 class="text-center">Login</h1>
        <form class="d-flex justify-content-center" action="login.php" method="post">
            <div>
                <div class="mb-3">
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $email ?? '' ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="<?php echo $password ?>">
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
        </form>

        <script src="bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>