<?php
//COOKIE names
$user_id ="user_id";
$user ="user";
$user_name ="user_name";
$user_email ="user_email";
$user_age = "user_age";
$user_gender = "user_gender";
$user_university = "user_university";
$user_faculty = "user_faculty";
$user_degree = "user_degree";
$user_department = "user_department";
$user_loggedIn ="user_loggedIn";

if(count($_COOKIE) > 0){
    if(isset($_COOKIE["user_loggedIn"]) && $_COOKIE["user_loggedIn"] === "1"){
        header("location: index.php");
        exit;
    }
}

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id,name,username,email,age,gender,university,faculty,degree,department,password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt,$id,$name, $username,$email,$age,$gender,$university,$faculty,$degree,$department, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){                            
                            // Store data in COOKIE
                            setcookie($user_id,$id,time()+(30*86400),'/');
                            setcookie($user_email,$email,time()+(30*86400),'/');
                            setcookie($user_name,$name,time()+(30*86400),'/');
                            setcookie($user,$username,time()+(30*86400),'/');
                            setcookie($user_age,$age,time()+(30*86400),'/');
                            setcookie($user_gender,$gender,time()+(30*86400),'/');
                            setcookie($user_university,$university,time()+(30*86400),'/');
                            setcookie($user_faculty,$faculty,time()+(30*86400),'/');
                            setcookie($user_degree,$degree,time()+(30*86400),'/');
                            setcookie($user_department,$department,time()+(30*86400),'/');
                            setcookie($user_loggedIn,true,time()+(30*86400),'/');
                            // Redirect user to index page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
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
    <style>
        body{ overflow-y: hidden; }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper" >
        <div class="page-content--bge5" style="background-color: rgba(0, 120, 255,0.7);">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <img src="images/icon/logo.png" alt="CoolAdmin">
                        </div>
                        <div class="login-form">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                    <p style="color:red; font-size: 12px;padding-left: 17px;"><?= $username_err ?></p>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    <p style="color:red; font-size: 12px;padding-left: 17px;"><?= $password_err ?></p>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="register.php">Sign Up Here</a>
                                </p>
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
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->