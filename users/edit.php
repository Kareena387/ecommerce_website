<?php
session_start();
include_once '../connect.php';

if(!isset($_SESSION['email'])){
    header('location:login.php');
}
if ($_GET){
    $id = $_GET['id'];
    $sql = "SELECT * from users WHERE id='$id'";
    $result=  $conn->query($sql);
    $row = $result->fetch_assoc(); // to fecth data which is equal to id
}
$full_nameErr = $emailErr = "";
//data insert into database
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $id = $_POST["id"];
    //validation
    if (empty($_POST["full_name"])) {
       $full_nameErr = "Full name is required";
   } else {
       $full_name = input($_POST["full_name"]);
   }
   if (empty($_POST['email'])) {
       $emailErr = "Email field required or invalid";
   } else {
       $email = input($_POST["email"]);
   }
    $old_image = $_POST['old_image'];
   //insert image
   if($_FILES['image']['name'] != ""){
       $filename = uniqid().$_FILES['image']['name'];
       $file = $_FILES['image']['tmp_name'];
       $target_dir = "../uploads/";
       unlink($target_dir.$old_image);
       move_uploaded_file($file, $target_dir.$filename);
   }else{
       $imageErr = "Image not found.";
   }
   if(!isset($filename)){
       $filename = $old_image;
   }
   if($full_nameErr == "" && $emailErr == ""){
    $created_at = date('Y-m-d H:i:s');
       $sql = "UPDATE users SET full_name = '$full_name' ,email='$email', image='$filename' WHERE id =$id;";
       if($conn->query($sql) ===  TRUE){
           echo "Data updated successsfully";
           header('location:list.php');
       }else{
           echo "Data updated Failed.";
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
        <title>Admin page</title>
    </head>
    <body>
        <div>
            <div class="row w-100">
                <?php include "../partial/sidemenu.php" ?>
                <div class="col col-10 position-relative">
                    <div class="content mt-3">                    
            <form class="" action="edit.php?id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
            <div>
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="full_name" name="full_name" class="form-control" id="full_name" value="<?php echo $row['full_name'] ?>">
                    <p class="text-danger"><?php echo $full_nameErr ?></p>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['email'] ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <p class="text-danger"><?php echo $emailErr ?></p>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Photo</label>
                    <input class="form-control" type="file" name="image">
                    <img src="../uploads/<?php echo $row['image'] ?>" alt="image" height=100px width=100px>
                    <input type="hidden" name="old_image" class="form-control" id="old_image" value="<?php echo $row['image'] ?>">
                </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>                    
                </div>
                    <footer class="bg-light text-center text-lg-start position-absolute bottom-0 start-50 translate-middle-x w-100">
                
                        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                            © 2020 Copyright:
                            <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                        </div>
                    
                    </footer>
            </div>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>