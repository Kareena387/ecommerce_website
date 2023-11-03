<?php
session_start();
include_once '../connect.php';

if(!isset($_SESSION['email'])){
    header('location:login.php');
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC); // to fetch all the data from database.

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
                    
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $index=>$eachuser){ ?>
                                <tr>
                                    <td><?php echo $index+1 ?></td>
                                    <td><?php echo $eachuser['full_name'] ?></td>
                                    <td><?php echo $eachuser['email'] ?></td>
                                    <td>
                                        <img src="../uploads/<?php echo $eachuser['image'] ?>" alt="image" height="50px" width="50px">
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $eachuser['id'] ?>">Edit |</a>
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $eachuser['id'] ?>">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
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