<?php
session_start();
include_once '../connect.php';

if(!isset($_SESSION['email'])){
    header('location:login.php');
}
if ($_GET){
    $id = $_GET['id'];
    $sql = "SELECT * from categories WHERE id='$id'";
    $result=  $conn->query($sql);
    $row = $result->fetch_assoc(); // to fecth data which is equal to id
}

// define variables and set to empty values
$nameErr = $slugErr = "";
$name = $slug = "";


//data insert into database
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
     //validation
     if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = input($_POST["name"]);
    }
    if (empty($_POST['slug'])) {
        $slugErr = "Slug field required";
    } else {
        $slug = input($_POST["slug"]);
    }
    $updated_by = $user['id'];
    $updated_at = date('Y-m-d H:i:s');

    if($nameErr == "" && $slugErr == ""){
        $sql = "UPDATE categories SET name = '$name' ,slug='$slug', updated_by='$updated_by', updated_at='$updated_at' WHERE id =$id;";
        if($conn->query($sql) ===  TRUE){
        echo "Data updated successsfully";
        header('location:list.php');
        }else{
            echo "Data upated Failed.";
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
                    <?php include "../partial/submenu.php" ?>
                    <div class="content mt-3">
            <form class="" action="edit.php?id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
            <div>
                <div class="mb-3">
                    <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['name'] ?>">
                    <p class="text-danger"><?php echo $nameErr ?></p>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="<?php echo $row['slug'] ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <p class="text-danger"><?php echo $slugErr ?></p>
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