<?php
date_default_timezone_set("Asia/Baku");
$currentTime = time();
require_once "config.php";
$image_to_check = "default_user.jpg";
$u = $_COOKIE['user_id'];
$sql = "SELECT image FROM images WHERE user_id =$u";
$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_assoc($result)) {
  $image_to_check = $row['image'];
}
include_once 'weather.php';
$msg = "";
$title = $start = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $calendar = $_POST['start_date'];
    $title = $_POST['event_title'];
    $start = $_POST['start_date'];
    $sql = "INSERT INTO calendar (title, start) VALUES (?, ?)";
    if($stmt = $link->prepare($sql)){
        $stmt->bind_param("ss",$title_param,$start_param);
        $title_param = $title;
        $start_param = $start;
        if($stmt->execute()){
            $msg = "Added successfully";
        }else $msg = "Sad(";
        $stmt->close();
    }else{
        $msg = "Smth went wrong(";
    }
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
    <title>Calendar</title>

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

    <!-- FullCalendar -->
    <link href='vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/modal_calendar.css">

    <style type="text/css">
    /* force class color to override the bootstrap base rule
       NOTE: adding 'url: #' to calendar makes this unneeded
     */
    .fc-event, .fc-event:hover {
          color: #fff !important;
          text-decoration: none;
    }
    </style>

</head>

<!-- animsition overrides all click events on clickable things like a,
      since calendar doesn't add href's be default,
      it leads to odd behaviors like loading 'undefined'
      moving the class to menus lead to only the menu having the effect -->
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
                        <li>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
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
                        <li class="active">
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
                        <li class="has-sub">
                            <a  href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
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
                        <li class="active">
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
                            <div class="noti-wrap"></div>
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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="weather">
                            <img
                            src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                            class="weather-icon"/>
                            <span style="font-weight: bold;"><?php echo $data->main->temp?>°C</span>
                        </div>
                        <div style="margin-bottom: 20px;"><span style="font-weight: bold;"><?php echo date("jS F, Y H:i l",$currentTime); ?></span></div>
                        <div class="row">
                            <div class="col-lg-4">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" style="margin-bottom: 20px;">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="event_title" id="event_title" placeholder="Enter event title">
                                    </div>
                                    <div class="form-group">
                                        <input type="datetime-local" name="start_date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="zmdi zmdi-plus"></i>Add Event</button>
                                    <small><?=$msg ?></small>
                                </form>
                            </div>
                        </div>
                        <div id="myModal" class="modal">
                          <div class="modal-content">
                            <span class="close">&times;</span>
                            <h4 id="title"></h4>
                            <div id="start" style="margin-top:5px;"></div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col" style="padding: 0;">
                              <div class="au-card" style="padding:20px 0;">
                                <div id="calendar"></div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- full calendar requires moment along jquery which is included above -->
    <script src="vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
    <script src="vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script type="text/javascript">

        $(function() {

          $.getJSON('events.php',function(data){
            console.log(data);
              // build trival night events for example data
            var events = data;
              // setup a few events
            $('#calendar').fullCalendar({
                header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
                },
                events: events,
                eventClick:  function(event, jsEvent, view) {
                    let span = document.getElementsByClassName("close")[0];
                    let modal = document.getElementById("myModal");
                    modal.style.display = "block";
                    $('#title').html(event.title);
                    $('#start').text(event.start);
                    span.onclick = function() {
                      modal.style.display = "none";
                    }
                    window.onclick = function(event) {
                      if (event.target == modal) {
                        modal.style.display = "none";
                      }
                    }
                },
                expandRows: true
            });
          });
        });
    </script>


</body>

</html>
<!-- end document-->
