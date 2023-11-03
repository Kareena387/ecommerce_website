<?php
session_start();
include_once '../connect.php';
include_once '../middleware/admin.php';

if(!isset($_SESSION['email'])){
    header('location:../login.php');
}
$sql = "SELECT C.id, C.name, U.full_name as fn  FROM categories C INNER JOIN users U ON C.created_by = U.id";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC); // to fetch all the data from database.

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
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>created By </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($categories as $index=>$eachcategory){ ?>
                                <tr>
                                    <td><?php echo $index+1 ?></td>
                                    <td><?php echo $eachcategory['name'] ?></td>
                                    <td><?php echo $eachcategory['fn'] ?></td>
                                
                                    <td>
                                        <a href="edit.php?id=<?php echo $eachcategory['id'] ?>">Edit |</a>
                                        <a href="show.php?id=<?php echo $eachcategory['id'] ?>">Show |</a>
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $eachcategory['id'] ?>">
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