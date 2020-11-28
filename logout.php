<?php
//delete the COOKIE
setcookie("user_id","",time()-3600,'/');
setcookie("user_email","",time()-3600,'/');
setcookie("user_name","",time()-3600,'/');
setcookie("user","",time()-3600,'/');
setcookie("user_age","",time()-3600,'/');
setcookie("user_gender","",time()-3600,'/');
setcookie("user_university","",time()-3600,'/');
setcookie("user_faculty","",time()-3600,'/');
setcookie("user_degree","",time()-3600,'/');
setcookie("user_department","",time()-3600,'/');
setcookie("user_loggedIn",true,time()-3600,'/');
// Redirect to login page
header("location: login.php");
exit;
?>