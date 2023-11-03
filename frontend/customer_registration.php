<?php
include '../connect.php'; // conneect database

// define variables and set to empty values
$full_nameErr = $emailErr = $passwordErr = $imageErr = "";
$full_name = $email = $password = "";


//data insert into database
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    

     //validation
     if (empty($_POST["full_name"])) {
        $full_nameErr = "Full name is required";
    } else {
        $full_name = input($_POST["full_name"]);
    }
    if (empty($_POST['email'])) {
        $emailErr = "Email field required or invalid";
    }else{
        $email = input($_POST["email"]);
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        // password_verify('password', $hashpassword);
        $password = password_hash(input($_POST["password"]), PASSWORD_DEFAULT);
    }
    

    if($full_nameErr == "" && $emailErr == "" && $passwordErr == ""){
        $exist_user_sql = "SELECT * FROM users WHERE email = '$email'";
        $exist_user_result = $conn->query($exist_user_sql);
        if($exist_user_result->num_rows > 0){
            $emailErr = "Email Already Exist."; 
        }else{
            $sql = "INSERT INTO users (full_name, email, password,role)
            VALUES ('$full_name', '$email', '$password','customer')";
            if($conn->query($sql) ===  TRUE){
            echo "Data insert successsfully";
            }else{
                echo "Data insert Failed.";
            }
            
        }
        
    }
    
    
}

function input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
        <title>First page</title>
    </head>
    <body>
        <h1 class="text-center">Register</h1>
        <form class="d-flex justify-content-center" action="customer_registration.php" method="post" enctype="multipart/form-data">
            <div>
                <div class="mb-3">
                    <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="full_name" name="full_name" class="form-control" id="full_name" value="<?php echo $full_name ?>">
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <span class="error text-danger"><?php echo $emailErr ?></span>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Photo</label>
                    <input class="form-control" type="file" name="image">
                
                </div>
                <div class="mb-3">  
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <span class="error"><?php echo $passwordErr ?></span>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <script src="bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>