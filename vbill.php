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
		padding:2%;
	}
	</style>

</head>
<body>
<div class="jumbotron bg-warning ">
  <h1 class="text-center display-1 text-light mb-4">Parliamentary Bill Voting System</h1>
</div>
<div class="all">
	<div class="left">
		<?php include_once("uleft.php"); ?>
	</div>
	<div class="right">
	<?php
							        error_reporting(0);
							      $smmg = $_GET['sms'];
							      $gmmg = $_GET['smg'];
							        if(isset($smmg)){
							            echo"<div class='alert alert-danger col-lg-12'>
							            <strong>Error! </strong>".$smmg."</div>";
							            
									}
									elseif(isset($gmmg)) {
										echo"<div class='alert alert-success col-lg-12'>
							            <strong>Success! </strong>".$gmmg."</div>";
									}
							  

							?>

						

						<h2>Bills</h2>
							<table border="1" class="table">	
									<tr>
										<th>Sno</th>
										<th>Date </th>
										<th>Bill</th>
										<th colspan="2">Vote</th>
									</tr>
									<tr>
										<?php
										session_start();
											if(empty($_SESSION['user'])){
												header("location:login.php");
											}
												require_once("connect.php");
											$s=1;
											$select = "SELECT * FROM bill";
											$query = mysqli_query($con,$select);
											while($array = mysqli_fetch_array($query)){
												$fn = $array['bname'];
										
												$id = $array['bid'];
												$cn = $array['bdate'];


												echo "<td>$s</td>
												<td>$cn</td>
												<td>$fn</td>
												<td><a href='y_bill.php?roja=$id' class='btn bg-success'>Yes</a></td>
												<td><a href='n_bill.php?roja=$id' class='btn bg-danger'>No</a></td>
												</tr>";
												$s++;
											}
										?>
									
								</table>
						
				
	</div>
</div>
</body>
</html>