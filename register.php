<?php
$user_birth = "user_birth";
if(count($_COOKIE) > 0){
    if(isset($_COOKIE["user_loggedIn"]) && $_COOKIE["user_loggedIn"] === "1"){
        header("location: index.php");
        exit;
    }
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $username =$email = $age = $gender = $university = $faculty = $degree = $department = $password = $confirm_password = "";
$name_err = $username_err =$email_err = $age_err = $gender_err = $university_err = $faculty_err = $degree_err = $department_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"])) ){
        $username_err = "Please enter a username.";
    }elseif(!preg_match('/^[^A-Z0-9]{1}[a-z0-9_]{5,31}$/', $_POST["username"])){
        $username_err = 'Must start with lower letter,6-32 characters,letters and numbers only';
    }else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    //validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";     
    }else{
        $name = trim($_POST["name"]);
    }
    //validate date of birth
    if(empty(trim($_POST["age"]))){
        $age_err = "Please enter a date";     
    }else{
        $age = trim($_POST["age"]);
    }
    //validate gender
    if(empty(trim($_POST["gender"]))){
        $gender_err = "Please enter a gender.";     
    }else{
        $gender = trim($_POST["gender"]);
    }
    //validate university
    if(empty(trim($_POST["university"]))){
        $university_err = "Please enter a university.";     
    }else{
        $university = trim($_POST["university"]);
    }
    //validate faculty
    if(empty(trim($_POST["faculty"]))){
        $faculty_err = "Please enter a faculty.";     
    }else{
        $faculty = trim($_POST["faculty"]);
    }
    //validate degree
    if(empty(trim($_POST["degree"]))){
        $degree_err = "Please enter a degree.";     
    }else{
        $degree = trim($_POST["degree"]);
    }
    //validate department
    if(empty(trim($_POST["department"]))){
        $department_err = "Please enter a department.";     
    }else{
        $department = trim($_POST["department"]);
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    //validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";     
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($name_err) && empty($email_err) && empty($age_err)  && empty($gender_err) && empty($university_err) && empty($faculty_err) && empty($degree_err) && empty($department_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, username, email, password, age, gender, university, faculty, degree, department) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $sql1 = "INSERT INTO $department (name, username, email, age, gender, university, faculty, degree ) VALUES  (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $link->prepare($sql);
        $stmt1 = $link->prepare($sql1);
        // Set parameters
        $param_name = $param_name1 = $name;
        $param_username = $param_username1 =  $username;
        $param_email = $param_email1 = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        $d=strtotime($age);
        setcookie($user_birth,$_POST['age'],time()+(30*86400),'/');
        $age = date("Y") - date("Y",$d);
        $param_age = $param_age1 = $age;
        $param_gender = $param_gender1 = $gender;
        $param_university = $param_university1 = $university;
        $param_faculty = $param_faculty1 = $faculty;
        $param_degree = $param_degree1 = $degree;
        $param_department = $department;

        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssssssss",$param_name, $param_username, $param_email, $param_password,$param_age,$param_gender,$param_university,$param_faculty,$param_degree,$param_department);
        $stmt1->bind_param("ssssssss",$param_name1, $param_username1, $param_email1, $param_age1,$param_gender1,$param_university1,$param_faculty1,$param_degree1);
        
        // Attempt to execute the prepared statement
        $stmt->execute();
        $stmt1->execute();
        // Redirect to login page
        header("location: login.php");
        
        // Close statement
        $stmt->close();
        $stmt1->close();
    }
    
    // Close connection
    $link->close();
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
    <div class="page-wrapper" style="background-color: rgba(0, 120, 255,0.7);">
        <div class="page-content--bge10" >
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content" style="padding-bottom: 30px;">
                        <div class="login-logo">
                            <img style="width: 120px;" src="images/icon/logo.png" alt="VTP" />
                        </div>
                        <div class="login-form">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                <div class="form-group">
                                    <label for="name">Name-Surname</label>
                                    <input class="au-input au-input--full" type="text" id="name" name="name">
                                    <p style="color:red; font-size: 12px;"><?= $name_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="au-input au-input--full" type="text" id="username" name="username">
                                    <p style="color:red; font-size: 12px;"><?= $username_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="au-input au-input--full" type="email" id="email" name="email">
                                    <p style="color:red; font-size: 12px;"><?= $email_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="age">Date of Birth</label>
                                    <input class="au-input au-input--full" type="date" id="age" name="age">
                                    <p style="color:red; font-size: 12px;"><?= $age_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                      <option></option>
                                      <option>F</option>
                                      <option>M</option>
                                    </select>
                                    <p style="color:red; font-size: 12px;"><?= $gender_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="university">University</label>
                                    <select class="form-control" id="university" name="university">
                                      <option></option>
                                      <option>ADA</option>
                                      <option>Khazar</option>
                                      <option>DIA</option>
                                      <option>AZMIU</option>
                                      <option>BBU</option>
                                      <option>BDU</option>
                                      <option>ADNSU</option>
                                      <option>ADAU</option>
                                      <option>ADIU</option>
                                      <option>AzTU</option>
                                      <option>OTDU</option>
                                      <option>UFAZ</option>
                                      <option>Ankara</option>
                                      <option>BMU</option>
                                      <option>ADU</option>
                                      <option>Istanbul</option>
                                    </select>
                                    <p style="color:red; font-size: 12px;"><?= $university_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="faculty">Faculty</label>
                                    <input class="au-input au-input--full" type="text" id="faculty" name="faculty">
                                    <p style="color:red; font-size: 12px;"><?= $faculty_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="degree">Degree</label>
                                    <select class="form-control" id="degree" name="degree">
                                      <option></option>
                                      <option>Associate</option>
                                      <option>Bachelor</option>
                                      <option>Master</option>
                                      <option>Doctoral</option>
                                      <option>Phd</option>
                                    </select>
                                    <p style="color:red; font-size: 12px;"><?= $degree_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select class="form-control" id="department" name="department">
                                      <option></option>
                                      <option>HR</option>
                                      <option>IT</option>
                                      <option>Accounting</option>
                                      <option>Procurement</option>
                                    </select>
                                    <p style="color:red; font-size: 12px;"><?= $department_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="passsword">Password</label>
                                    <input class="au-input au-input--full" type="password" name="password">
                                    <p style="color:red; font-size: 12px;"><?= $password_err ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" id="confirm_password" name="confirm_password">
                                    <p style="color:red; font-size: 12px;"><?= $confirm_password_err ?></p>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
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