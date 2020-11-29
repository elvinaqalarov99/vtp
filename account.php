<?php
	require_once "config.php";
    $image_to_check = "default_user.jpg";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$d = strtotime($_POST['age']);
		$age = Date('Y')-Date('Y',$d);
		$gender = $_POST['gender'];
		$university = $_POST['university'];
		$faculty = $_POST['faculty'];
		$degree = $_POST['degree'];
		$sql = "UPDATE users SET name=?,username=?,email=?,age=?,gender=?,university=?,faculty=?,degree= ? WHERE id =".$_COOKIE['user_id'];
		if ($stmt = mysqli_prepare($link, $sql)) {
			$stmt->bind_param('ssssssss', $name,$username,$email,$age,$gender,$university,$faculty,$degree);
		    if ($stmt->execute()) {
	            setcookie("user_email",$email,time()+(30*86400),'/');
	            setcookie("user_name",$name,time()+(30*86400),'/');
	            setcookie("user",$username,time()+(30*86400),'/');
	            setcookie("user_age",$age,time()+(30*86400),'/');
	            setcookie("user_gender",$gender,time()+(30*86400),'/');
	            setcookie("user_university",$university,time()+(30*86400),'/');
	            setcookie("user_faculty",$faculty,time()+(30*86400),'/');
	            setcookie("user_degree",$degree,time()+(30*86400),'/');
	            setcookie("user_birth",$_POST['age'],time()+(30*86400),'/');
	            header('location:'.$_SERVER['PHP_SELF']);
		    }
		    $stmt->close();
		}
	}
	// File upload path
	if(isset($_POST["submit"])){
		$targetDir = "images/users/";
		$fileName = basename($_FILES["image"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		if(isset($_POST["submit"]) && !empty($_FILES["image"]["name"])){
		    // Allow certain file formats
		    $allowTypes = array('jpg','png','jpeg','gif','pdf');
		    if(in_array($fileType, $allowTypes)){
		        // Upload file to server
		        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
		            $sql = "SELECT image FROM images WHERE user_id =?";
		            $stmt = $link->prepare($sql);
		            $stmt->bind_param("s",$user_id_image);
		            $user_id_image = $_COOKIE['user_id'];
		            $stmt->execute();
		            $stmt->store_result();
		            $result = mysqli_query($link, $sql);
		            if(mysqli_stmt_num_rows($stmt) !== 1){
		            	// Insert image file name into database
			            $sql1 = "INSERT INTO images (image,user_id) VALUES (?,?)";
			            $stmt1=$link->prepare($sql1);
			            $stmt1->bind_param('ss',$fileName1,$user_image_id);
			            $user_image_id = $_COOKIE['user_id'];
			            $fileName1 = basename($_FILES['image']['name']);
			            $stmt1->execute();
			            $stmt1->close();
	            		header('location:'.$_SERVER['PHP_SELF']);	
		            }else{
		            	$u = $_COOKIE['user_id'];
      						$sql3 = "UPDATE images SET image = ? WHERE user_id =$u ";
      						$stmt2=$link->prepare($sql3);
      						$stmt2->bind_param('s',$fileName2);
      						$fileName2 = basename($_FILES['image']['name']);
      						$stmt2->execute();
      						$stmt2->close();
		            }
		            $u = $_COOKIE['user_id'];
		            $fileName2 = basename($_FILES['image']['name']);
      					$sql3 = "SELECT image FROM images WHERE user_id =$u AND image=$fileName2";
      					$result = mysqli_query($link, $sql3);
      					while($row = mysqli_fetch_assoc($result)) {
      					  $image_to_check = $row['image'];
      					}
		        }
		    }
		}
		$stmt->close();
	}
?>
<?php include_once "header.php"; ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data"
                                class="form-horizontal">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <label for="text-input"
                                                    class=" form-control-label">Name-Surname</label>
                                                <input type="text" value="<?=$_COOKIE['user_name'] ?>" name="name" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <label for="text-input"
                                                    class=" form-control-label">Username</label>
                                                <input type="text" value="<?=$_COOKIE['user'] ?>" name="username" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <label for="text-input"
                                                    class=" form-control-label">Email</label>
                                                <input type="email" value="<?=$_COOKIE['user_email'] ?>" name="email" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <label for="age">Date of Birth</label>
                                                <input class="au-input au-input--full" type="date" id="age"
                                                    name="age" value="<?=$_COOKIE['user_birth'] ?>">

                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <label for="text-input"
                                                    class=" form-control-label">Faculty</label>
                                                <input type="text" name="faculty" class="form-control" value="<?=$_COOKIE['user_faculty'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <label for="gender">Gender</label>
                                                <select class="form-control" id="gender" name="gender" value="<?=$_COOKIE['user_gender'] ?>">
                                                	<?php
                                                	$m_selected = $f_selected =  "";
                                                  	switch($_COOKIE['user_gender']) {
                                                  		case 'M':
                                                  			$m_selected = "selected='selected'";
                                                  			break;
                                                  		case 'F':
                                                  			$f_selected = "selected='selected'";
                                                  			break;
                                                  	}
                                                  ?>
                                                    <option <?=$f_selected ?>>F</option>
                                                    <option <?=$m_selected ?>>M</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <label for="university">University</label>
                                                <select class="form-control" id="university"
                                                    name="university" value="<?=$_COOKIE['user_university'] ?>">
                                                    <?php 
                                                    	$ada_selected = $khazar_selected = $dia_selected = $azmiu_selected = $bbu_selected = $istanbul_selected =$bdu_selected = $adnsu_selected = $adau_selected = $adiu_selected = $aztu_selected = $otdu_selected = $ufaz_selected = $ankara_selected = $bmu_selected = $adu_selected = "";
                                                  	switch ($_COOKIE['user_university']) {
                                                  		case 'ADA':
                                                  			$ada_selected = "selected='selected'";
                                                  			break;
                                                      case 'Khazar':
                                                        $khazar_selected = "selected='selected'";
                                                        break;
                                                      case 'DIA':
                                                        $dia_selected = "selected='selected'";
                                                        break;
                                                      case 'AZMIU':
                                                        $azmiu_selected = "selected='selected'";
                                                        break;
                                                      case 'BBU':
                                                        $bbu_selected = "selected='selected'";
                                                        break;
                                                      case 'Istanbul':
                                                        $istanbul_selected = "selected='selected'";
                                                        break;
                                                  		case 'BDU':
                                                  			$bdu_selected = "selected='selected'";
                                                  			break;
                                                  		case 'ADNSU':
                                                  			$adnsu_selected = "selected='selected'";
                                                  			break;
                                                  		case 'ADAU':
                                                  			$adau_selected = "selected='selected'";
                                                  			break;
                                                  		case 'ADIU':
                                                  			$adiu_selected = "selected='selected'";
                                                  			break;
                                                  		case 'AzTU':
                                                  			$aztu_selected = "selected='selected'";
                                                  			break;
                                                  		case 'OTDU':
                                                  			$otdu_selected = "selected='selected'";
                                                  			break;
                                                  		case 'UFAZ':
                                                  			$ufaz_selected = "selected='selected'";
                                                  			break;
                                                  		case 'Ankara':
                                                  			$ankara_selected = "selected='selected'";
                                                  			break;
                                                  		case 'BMU':
                                                  			$BMU_selected = "selected='selected'";
                                                  			break;
                                                  		case 'ADU':
                                                  			$adu_selected = "selected='selected'";
                                                  			break;

                                                  	}
                                                  ?>
                                                    <option <?=$ada_selected ?>>ADA</option>
                                                    <option <?=$khazar_selected ?>>Khazar</option>
                                                    <option <?=$dia_selected ?>>DIA</option>
                                                    <option <?=$azmiu_selected ?>>AZMIU</option>
                                                    <option <?=$bbu_selected ?>>BBU</option>
                                                    <option <?=$bdu_selected ?>>BDU</option>
                                                    <option <?=$adnsu_selected ?>>ADNSU</option>
                                                    <option <?=$adau_selected ?>>ADAU</option>
                                                    <option <?=$adiu_selected ?>>ADIU</option>
                                                    <option <?=$aztu_selected ?>>AzTU</option>
                                                    <option <?=$otdu_selected ?>>OTDU</option>
                                                    <option <?=$ufaz_selected ?>>UFAZ</option>
                                                    <option <?=$ankara_selected ?>>Ankara</option>
                                                    <option <?=$bmu_selected ?>>BMU</option>
                                                    <option <?=$adu_selected ?>>ADU</option>
                                                    <option <?=$istanbul_selected ?>>Istanbul</option>

                                                </select>

                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <div class="col-lg-12 col-md-8 col-sm-12">
                                                <label for="degree">Degree</label>
                                                <select class="form-control" id="degree" name="degree" value="<?=$_COOKIE['user_degree'] ?>">
                                                	<?php
                                                		$assoc_selected = $bac_selected = $master_selected = $doc_selected = $phd_selected = "";
                                                		switch ($_COOKIE['user_degree']) {
                                                			case 'Associate':
                                                				$assoc_selected = "selected='selected'"; 
                                                				break;
                                                			case 'Bachelor':
                                                				$bac_selected = "selected='selected'";
                                                				break;
                                                			case 'Master':
                                                				$master_selected = "selected='selected'";
                                                				break;
                                                			case 'Doctoral':
                                                				$doc_selected = "selected='selected'";
                                                				break;
                                                			case 'Phd':
                                                				$phd_selected = "selected='selected'";
                                                				break;
                                                		}

                                                	?>
                                                    <option <?=$assoc_selected ?>>Associate</option>
                                                    <option <?=$bac_selected ?>>Bachelor</option>
                                                    <option <?=$master_selected ?>>Master</option>
                                                    <option <?=$doc_selected ?>>Doctoral</option>
                                                    <option <?=$phd_selected ?>>Phd</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-6 col-md-8">
                                                <label for="text-input" class=" form-control-label"><img
                                                        src="images/users/<?=$image_to_check?>" alt=""></label>
                                                <input style="width: 100%;" type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                  <div class="col-md-6">
                                   <input name="submit" type="submit" class="btn btn-primary btn-sm">
                                   </input>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "footer.php"; ?>
