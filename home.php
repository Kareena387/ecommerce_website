<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['email'])){
    header('location:login.php');
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
        <div>
            <div class="row w-100">
            <?php include "./partial/sidemenu.php" ?>
                <div class="col col-10 position-relative">
                    <?php include "./partial/submenu.php" ?>
                    <div class="content mt-3">
                        <div class="row">
                            <div class="col col-4 mt-2">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-3">
                                                <img src="" alt="icon">
                                            </div>
                                            <div class="col">
                                                <h5>Total Product</h5>
                                                <p>20</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-4 mt-2">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-3">
                                                <img src="" alt="icon">
                                            </div>
                                            <div class="col">
                                                <h5>Total Product</h5>
                                                <p>20</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-4 mt-2">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-3">
                                                <img src="" alt="icon">
                                            </div>
                                            <div class="col">
                                                <h5>Total Product</h5>
                                                <p>20</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-4 mt-2">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-3">
                                                <img src="" alt="icon">
                                            </div>
                                            <div class="col">
                                                <h5>Total Product</h5>
                                                <p>20</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    

                        
                    </div>
                
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>