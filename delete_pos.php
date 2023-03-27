<?php
session_start();
if(empty($_SESSION['Admin'])){
	header("location:login.php");
}
	require_once("connect.php");

$uid = $_GET['roja'];
$update = "DELETE FROM Position WHERE pid='$uid'";
$ney=mysqli_query($con,$update);
          if($ney){
            header("location:position.php");
          }

          else{
              $smmg= "Fail to regster";
          }
?>