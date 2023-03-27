<?php
session_start();
if(empty($_SESSION['Admin'])){
	header("location:login.php");
}
require_once("connect.php");
if(isset($_POST['reg'])){
	$fname = $_POST['fname'];
	$uname = $_POST['uname'];
	$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$user = "Admin";

	$select = "INSERT INTO userz(fullname,username,passwordz,userType) VALUES('$fname','$uname','$pass','$user')";
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
<!DOCTYPE html>
<html>
<head>
	<title>Poll</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<style>
	.all{
		margin:0.5%;

	}
	.left{
		float:left;
		width:18%;
	}
	.right{
		float:right;
		width:82%;
		padding:0 2%;
    }
    fieldset{
    width:30%;
    margin: auto;
    padding: 15px 20px;
    border-radius: 10%;
    opacity: 1;

}
	</style>

</head>
<body>
<div class="jumbotron bg-warning ">
  <h1 class="text-center display-1 text-light mb-4">Parliamentary Bill Voting System</h1>
</div>
<div class="all">
	<div class="left">
		<?php include_once("aleft.php"); ?>
	</div>
	<div class="right">


    
        <h2>Manage Adminstration</h2><hr>
        <fieldset class="bg-warning">
        <?php
		        error_reporting(0);
		      
		        	      
		        if(isset($smmg)){
		            echo"<div class='alert alert-danger col-lg-12'>
		            <strong>Error! </strong>".$smmg."</div>";
		            
		        }
		  

		?>
						<form action="manage_admin.php" method="POST">
								<h2>Add Admin Form</h2>
								Full Name: <input type="text" name="fname" class="form-control">	
							
								User Name: <input type="text" name="uname" class="form-control">	
									
								Password: <input type="Password" name="pass" class="form-control">	<br>	
								<input type="submit" name="reg" value="Add" class="bg-success">
								<input type="reset" name="" value="Clean" class="bg-warning">
								<!-- I have an account <a href="login.php"> login</a> -->


						</form>
                        </fieldset>	<br><br>


                        <h3>List of Admins</h3>
                        <table border="1" class="table">	
									<tr>
										<th>Sno</th>
										<th>Full Name</th>
										<th>User Name</th>
										<th>User Status</th>
										<th>User Type</th>
										<th colspan="2">Update</th>
									</tr>
									<tr>
										<?php
										session_start();
											if(empty($_SESSION['Admin'])){
												header("location:login.php");
											}
												require_once("connect.php");
											$s=1;
											$select = "SELECT * FROM userz WHERE usertype='Admin'";
											$query = mysqli_query($con,$select);
											while($array = mysqli_fetch_array($query)){
												$fn = $array['fullname'];
												$un = $array['username'];
												$st = $array['statuz'];
												$ut = $array['usertype'];
												$id = $array['uid'];


												echo "<td>$s</td>
												<td>$fn</td>
												<td>$un</td>
												<td>$st</td>
												<td>$ut</td>
												
												<td><a href='delete_user.php?roja=$id' class='btn bg-danger'>Delete</a></td>
												</tr>";
												$s++;
											}
										?>
									
								</table>              
	</div>
</div>
</body>
</html>