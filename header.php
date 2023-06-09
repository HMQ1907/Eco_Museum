<?php
session_start();
require_once('utils/utility.php');
require_once('Database/dbhelper.php');
$user = getUserToken();
$sql =  "select * from explore";
$menuExplore= executeResult($sql);
$sql = "select * from category";
$menuCate = executeResult($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <title><?=$title?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="asset/img/iconlogo.png" type="image/gif" sizes="16x16">
</head>

<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/0ec45a6e18.js" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Montserrat:wght@400;500;700&display=swap"
        rel="stylesheet">
    <!-- font -->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="style-explore.css">
    <link rel="stylesheet" href="asset/css/responsive.css">
    <style>
    .fixed-top {
        height: 160px;
        background-color: rgba(23, 31, 78, 0.17);
    }

    .fixed-top-colored {
        background-color: black;
        height: 160px;
    }

    .fixed-top-transparent {
        background-color: transparent;
    }

    .number-cart {
        height: 20px;
        width: 20px;
        background-color: #EFBF29;
        border-radius: 50%;
        position: relative;
        top: 2px;
        left: 99.5%;
        color: #262A67;
        font-size: 11px;
        font-weight: bold;
    }

    .text-num-cart {
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
    }

    @media only screen and (max-width: 600px) {
        .nav-eco-main {
            background-color: #121f6a;
            z-index: 99;
            padding-top: 0;
            height: 120px;
        }
    }
    </style>

    <body>
        <?php
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart']= [];
                 }
                $count =0 ;
                foreach($_SESSION['cart'] as $item){
                 $count += $item['num'];
                }
                    ?>
        <div class="container-fluid p-0 position-relative  mg-auto">
            <!-- header -->

            <nav class="nav-eco-small navbar navbar-expand-lg pt-0 ">
                <div class="container">

                    <div class=" navbar-collapse nav-ecocenter-small">
                        <?php 
                            if($count!=0){
                                echo '<span class="number-cart"><span class="text-num-cart">'.$count.'</span></span>';
                        }
                        ?>
                        <ul class="nav-eco-small-content navbar ml-auto ">
                            <li class="nav-item active "><a href="contact.php">CONTACT</a></li>
                            <li style="color:#C5C5C5">|</li>
                            <!-- khi dang nhap -->
                            <?php
                            if(!isset($user)){
                                echo 
                                '<li class="nav-item active" style="color:#C5C5C5"><a href="admin/authen/login.php">ACCOUNT</a></li>';
                            }else{
                                echo'<li class="nav-item active" style="font-weight:bold; font-size:12px;color:#C5C5C5; text-transform: uppercase;margin-bottom:-2.5px;">'.$user['fullname'].'</li>
                                
                                <li class="nav-item active"><a href="bill.php">BILLS</a></li>
                                <li class="nav-item active"><a href="admin/authen/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>

                                ';                               
                            }
                           ?>
                            <!-- khi dang nhap -->
                            <li style="color:#C5C5C5">|</li>
                            <li class="nav-item active"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></li>

                            <li class="nav-item active"><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <nav class="col-12 col-md-12 navbar navbar-expand-lg navbar-light nav-eco-main py-3 ">
                <div class="container">
                    <a href="index.php" class="navbar-brand d-flex align-items-center"><img
                            src="asset/img/logowhite.png" alt="" style="width:109px;"></a>
                    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler"><span><i class="fa-solid fa-bars"
                                style="color:white"></i></span></button>
                    <div id="navbarSupportedContent" class="collapse navbar-collapse light">
                        <ul class="navbar-nav ml-auto ">
                            <li>
                                <div class="dropdown">
                                    <a class="btn  dropdown-toggle nav-ecocenter" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        EXPLORE
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?php
                                            foreach ($menuExplore as $item){
                                                echo '<a class="dropdown-item" href="explore.php?id='.$item['id'].'">'.$item['title'].'</a>';
                                            }
                                            ?>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item active"><a class="btn nav-ecocenter " href="visit.php"
                                    class="nav-link "> VISIT </a></li>
                            <li>
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle nav-ecocenter " href="store.php" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        STORE
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="store.php">All Of Sourvenir</a>
                                        <?php
                                            foreach($menuCate as $item){
                                                echo '<a class="dropdown-item" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>';
                                            }
                                            ?>
                                    </div>
                                </div>
                            </li>
                            <li><a class="btn ticket-button" href="ticket.php">
                                    TICKETS
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- header -->

        </div>