<?php 
$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
$server_name = $_SERVER['SERVER_NAME'];
$url = $protocol."://".$server_name."/ecommerce/";
?>
<div class="sub_navbar">
                        <nav class="navbar navbar-light bg-light">
                            <form class="container justify-content-end">
                            <!-- Large button groups (default and split) -->
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $user['full_name'] ?>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="<?php echo $url.'logout.php' ?>">Logout</a></li>
                                    </ul>
                                </div>
                            </form>
                        </nav>
                    </div>