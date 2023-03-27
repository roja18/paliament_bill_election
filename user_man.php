<!DOCTYPE html>
<html>
<head>
	<title>Poll</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<script src="jquery/jquery.min.js"><script>
	<script>
		$(document).ready(function(){
		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
		});
	</script>
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
    border-radius: 1%;
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


    
        <h2>Manage User</h2><hr>
        <fieldset class="bg-warning">
        <?php
		        error_reporting(0);
		      
		        if(isset($smmg)){
		            echo"<div class='alert alert-danger col-lg-12'>
		            <strong>Error! </strong>".$smmg."</div>";
		            
		        }
		  

		?>
						<form action="indexn.php" method="POST">
								<h3>Regstration Form</h3>
								Full Name: <input type="text" name="fname" class="form-control">	
							
								User Name: <input type="text" name="uname" class="form-control">	
							
								Phone: <input type="number" name="phone" class="form-control">	
							
								Password: <input type="Password" name="pass" class="form-control">	<br>	
								<input type="submit" name="reg" value="Regster" class="bg-success">
								<input type="reset" name="" value="Clean" class="bg-warning"><br>	
								<!-- I have an account <a href="login.php"> login</a> -->
								<!-- I have an account <a href="login.php"> login</a> -->


                        </form>
                        </fieldset>	<br><br>

						<input id="myInput" type="text" placeholder="Search..">
                        <h3>List of user</h3>
                        <table border="1" class="table">	
									<tr class="bg-warning">
										<th>Sno</th>
										<th>Full Name</th>
										<th>User Name</th>
										<th>User Status</th>
										<th>User Type</th>
										<th colspan="2">Update</th>
									</tr>
									<tbody id="myTable">
									<tr>
										<?php
										session_start();
											if(empty($_SESSION['Admin'])){
												header("location:login.php");
											}
												require_once("connect.php");
											$s=1;
											$select = "SELECT * FROM userz WHERE usertype='user'";
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
												<td><a href='activate.php?roja=$id' class='btn bg-success'>Activate</a></td>
												<td><a href='delete_user.php?roja=$id' class='btn bg-danger'>Delete</a></td>
												</tr>";
												$s++;
											}
										?>
									</tbody>
								</table>              
	</div>
</div>
</body>
</html>