<?php
require_once("connect.php");
if(isset($_POST['reg'])){
	$fname = $_POST['fname'];
	$uname = $_POST['uname'];
	$phone = $_POST['phone'];
	$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

	$select = "INSERT INTO userz(fullname,username,phone,passwordz) VALUES('$fname','$uname','$phone','$pass')";
	// echo $select;
	// die();
	$ney=mysqli_query($con,$select);
          if($ney){
            header("location:user_man.php");
          }

          else{
              $smmg= "Fail to regster";
          }

}
?>
