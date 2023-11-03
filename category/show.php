<?php
session_start();
include_once '../connect.php';

if(!isset($_SESSION['email'])){
    header('location:login.php');
}
$id = $_GET['id'];
$sql = "SELECT * from categories WHERE id='$id'";
$result=  $conn->query($sql);
$row = $result->fetch_assoc();

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
                    <a href="create.php" class="btn btn-primary mb-2">Create</a>
                    <a href="list.php" class="btn btn-primary mb-2">List</a>

                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>name</td>
                                <td><?php echo $row['name'] ?></td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td><?php echo $row['slug'] ?></td>
                            </tr>
                            <tr>
                                <td>Created By</td>
                                <td><?php echo $row['created_by'] ?></td>
                            </tr>
                            <tr>
                                <td>Updated By</td>
                                <td><?php echo $row['updated_by'] ?></td>
                            </tr>
                            <tr>
                                <td>Created At</td>
                                <td><?php echo $row['created_at'] ?></td>
                            </tr>
                            <tr>
                                <td>Updated At</td>
                                <td><?php echo $row['updated_at'] ?></td>
                            </tr>
                        </tbody>
                    </table>  
                    
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