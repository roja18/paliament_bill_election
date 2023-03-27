<?php
session_start();
if(empty($_SESSION['Admin'])){
	header("location:login.php");
}
	require_once("connect.php");

$uid = $_GET['roja'];
$update = "DELETE FROM userz WHERE uid='$uid'";
$ney=mysqli_query($con,$update);
          if($ney){
            header("location:user_man.php");
          }

          else{
              $smmg= "Fail to regster";
          }
?>