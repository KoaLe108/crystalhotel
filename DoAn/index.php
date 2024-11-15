<?php
include_once "model/connect.php";
include_once "model/thongtinphong.php";
session_start();
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRYSTAL Hotel</title>
</head>
<body>
    <?php
    $kn = new connect();
    ?>
    <div class="container">
        <div class="row">
            <?php
            $ctrl = 'home';
            if (isset($_GET['action'])) {
                $ctrl = $_GET['action'];
            }
            include_once "controller/$ctrl.php";
            ?>
        </div>
    </div>

</body>