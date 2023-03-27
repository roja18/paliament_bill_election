<?php
session_start();
if(empty($_SESSION['user'])){
	header("location:login.php");
}
	require_once("connect.php");
$mtu = $_SESSION['user'];
$uid = $_GET['roja'];
$yangu = $uid.$mtu;
$update = "INSERT INTO result(bid,result,voter,yangu) VALUES('$uid','NO','$mtu','$yangu')";
// echo $update;
// die();
$ney=mysqli_query($con,$update);
          if($ney){
             $gmmg= "Thank you for vote";

            header("location:vbill.php?smg=$gmmg");
          }

          else{
              $smmg= "Fail ushapiga kula";
            header("location:vbill.php?sms=$smmg");

          }
?>