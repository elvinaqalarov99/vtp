<?php 
require_once "config.php";
$sql = "SELECT faculty,COUNT(username) AS users FROM users GROUP BY faculty";
$result = mysqli_query($link, $sql);
$to_encode = array();
while($row = mysqli_fetch_assoc($result)) {
  $to_encode[] = $row;
}
echo json_encode($to_encode);

?>