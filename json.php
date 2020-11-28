<?php 
require_once "config.php";
$sql = "SELECT gender,COUNT(username) as users FROM users GROUP BY gender";
$result = mysqli_query($link, $sql);
$to_encode = array();
while($row = mysqli_fetch_assoc($result)) {
  $to_encode[] = $row;
}
echo json_encode($to_encode);

?>