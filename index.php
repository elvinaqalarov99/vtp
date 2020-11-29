<?php
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_COOKIE["user_loggedIn"]) || $_COOKIE["user_loggedIn"] != 1){
    header("location: login.php");
    exit;
}
require "config.php";

$sql = "SELECT id,name,username,email,age,gender,university,faculty,degree,department FROM users";
$sql1 = "SELECT id FROM HR";
$sql2 = "SELECT id FROM IT";
$sql3 = "SELECT id FROM Procurement";
$sql4 = "SELECT id FROM Accounting";
if($stmt = mysqli_prepare($link,$sql)){
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        $rows = mysqli_stmt_num_rows($stmt);
        mysqli_stmt_bind_result($stmt, $id, $name, $username, $email, $age,$gender,$university,$faculty,$degree,$department);
    }
}
if($stmt1 = mysqli_prepare($link,$sql1)){
    if(mysqli_stmt_execute($stmt1)){
        mysqli_stmt_store_result($stmt1);
        $rows1 = mysqli_stmt_num_rows($stmt1);
    }
}
if($stmt2 = mysqli_prepare($link,$sql2)){
    if(mysqli_stmt_execute($stmt2)){
        mysqli_stmt_store_result($stmt2);
        $rows2 = mysqli_stmt_num_rows($stmt2);
    }
}
if($stmt3 = mysqli_prepare($link,$sql3)){
    if(mysqli_stmt_execute($stmt3)){
        mysqli_stmt_store_result($stmt3);
        $rows3 = mysqli_stmt_num_rows($stmt3);
    }
}
if($stmt4 = mysqli_prepare($link,$sql4)){
    if(mysqli_stmt_execute($stmt4)){
        mysqli_stmt_store_result($stmt4);
        $rows4 = mysqli_stmt_num_rows($stmt4);
    }
}
include_once 'weather.php';
?>
<?php $active_dashboard = "active"; include_once "header.php"; ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="weather" style="margin: 0 auto;">
                            <img
                            src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                            class="weather-icon"/>
                            <span style="font-weight: bold;"><?php echo $data->main->temp?>°C</span>
                        </div>
                        <div><span style="font-weight: bold;"><?php echo date("jS F, Y H:i l",$currentTime); ?></span></div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c1 p-b-25">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-group"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?=$rows?></h2>
                                                <span>Total members</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c2 p-b-25">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i style="font-size: 3rem;" class="fa fa-user"></i>
                                            </div><br/>
                                            <div class="text">
                                                <h2 style="margin-top: 5px; margin-bottom: 0;"><?=$rows1?></h2>
                                                <span>HR</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c3 p-b-25">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i style="font-size: 3rem;" class="fa fa-desktop"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="margin-top: 5px; margin-bottom: 0;"><?=$rows2?></h2>
                                                <span>IT</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c4 p-b-25">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i style="font-size: 3rem;" class="fa fa-gears"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="margin-top: 5px; margin-bottom: 0;"><?=$rows3?></h2>
                                                <span>Procurement</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-2">
                                <div class="overview-item overview-item--c3 p-b-25">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i style="font-size: 3rem;" class="fa fa-dollar"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="margin-top: 5px; margin-bottom: 0;"><?=$rows4?></h2>
                                                <span>Accounting</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Members</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>username</th>
                                                <th>email</th>
                                                <th>age</th>
                                                <th>gender</th>
                                                <th>university</th>
                                                <th>faculty</th>
                                                <th>degree</th>
                                                <th>department</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php 
                                                while(mysqli_stmt_fetch($stmt)){
                                                    echo "<tr>
                                                            <td>".$id."</td>
                                                            <td>".$name."</td>
                                                            <td>".$username."</td>
                                                            <td>".$email."</td>
                                                            <td>".$age."</td>
                                                            <td>".$gender."</td>
                                                            <td>".$university."</td>
                                                            <td>".$faculty."</td>
                                                            <td>".$degree."</td>
                                                            <td>".$department."</td>
                                                          </tr>";
                                                }
                                                mysqli_stmt_close($stmt);
                                                mysqli_close($link);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->

<?php include_once "footer.php"; ?>