<?php 
$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
$server_name = $_SERVER['SERVER_NAME'];
$url = $protocol."://".$server_name."/ecommerce/";
?>
<div class="sidebar_menu col col-2 bg-dark text-white">
                    <h3 class="ms-2 mt-2">Ecommerce</h3>
                    <div class="mt-3 mb-3 ms-2">
                        <img src="./uploads/<?php echo $user['image'] ?? '' ?>" alt="image" height="30px" width="30px" class="d-inline rounded">
                        <p class="d-inline"><?php echo $user['full_name'] ?></p>
                    </div>
                    <div style="height:700px;">
                        <nav class ="navbar ms-3">
                        <ul class ="nav navbar-nav ">
                        <li class ="nav-item">
                        <a class ="nav-link text-white" href="<?php echo $url.'home.php' ?>"> Home </a>
                        </li>
                        <li class ="nav-item">
                        <a class ="nav-link text-white" href="<?php echo $url.'category/list.php' ?>"> Category </a>
                        </li>
                        <li class ="nav-item">
                        <a class ="nav-link text-white" href="#"> Contact </a>
                        </li>
                        <li class ="nav-item">
                        <a class ="nav-link text-white" href="#"> Blogs </a>
                        </li>
                        </ul>
                        </nav>  
                    </div>                 
                </div>