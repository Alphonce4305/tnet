<?php 

if (isset($_SESSION['utoken'])) {
  $utoken = $_SESSION['utoken'];
}else{
  header('Location:login.php');
}

?>