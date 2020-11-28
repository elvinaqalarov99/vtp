<?php
require_once "config.php";
$image_to_check = "default_user.jpg";
$u = $_COOKIE['user_id'];
$sql = "SELECT image FROM images WHERE user_id =$u";
$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_assoc($result)) {
  $image_to_check = $row['image'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>VTP</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="<?=$active_dashboard ?>">
                            <a  href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?=$active_charts ?>">
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li class="<?=$active_tables ?>">
                            <a href="#" class="js-arrow">
                                <i class="fas fa-table"></i>Tables</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li class="<?=$active_HR ?>">
                                    <a href="HR.php">HR</a>
                                </li>
                                <li class="<?=$active_IT ?>">
                                    <a href="IT.php">IT</a>
                                </li>
                                <li class="<?=$active_accounting ?>">
                                    <a href="accounting.php">Accounting</a>
                                </li>
                                <li class="<?=$active_procurement ?>">
                                    <a href="procurement.php">Procurement</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?=$active_calendar ?>"> 
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?=$active_dashboard ?>">
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?=$active_charts ?>">
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li class="<?=$active_tables ?>">
                            <a href="#" class="js-arrow">
                                <i class="fas fa-table"></i>Tables</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="<?=$active_HR ?>">
                                    <a href="HR.php">HR</a>
                                </li>
                                <li class="<?=$active_IT ?>">
                                    <a href="IT.php">IT</a>
                                </li>
                                <li class="<?=$active_accounting ?>">
                                    <a href="accounting.php">Accounting</a>
                                </li>
                                <li class="<?=$active_procurement ?>">
                                    <a href="procurement.php">Procurement</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?=$active_calendar ?>">
                            <a href="calendar.php">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="">
                                <input id="myInput" class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; members..." />
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img style="width: 35px;height: 35px;" src="images/users/<?=$image_to_check?>" alt="<?=$_COOKIE['user_name'] ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?=$_COOKIE['user_name'] ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <img src="images/users/<?=$image_to_check?>" alt="<?=$_COOKIE['user_name'] ?>" />
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <?=$_COOKIE['user_name'] ?>
                                                    </h5>
                                                    <span class="email"><?=$_COOKIE['user_email']  ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="account.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
