<?php
require_once("connect.php");
if(isset($_POST['reg'])){
	$cand = trim(stripslashes(htmlentities(strip_tags(trim($_POST['fname'])))));
	$pos = $_POST['pos'];


	$inset = "INSERT INTO candidate(candName,pos) VALUES ('$cand','$pos')";
	// echo $inset;
	// die;
	$ney=mysqli_query($con,$inset);
          if($ney){
			$gmmg= "success to add Candidate";
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

</head>
<body>
<div class="jumbotron bg-warning ">
  <h1 class="text-center display-1 text-light mb-4">Parliamentary Bill Voting System</h1>
</div>
<div class="container mb-4">
		<div class="col-md-12 col-lg-12">
			<div class="row">	
				<div class="card mycard">	
					<div class="card-body">
						<div class="card-title top">
                        |<a href="dashbord.php">Manage Users </a>|
							<a href="manage_admin.php">Manage Admistrator </a>|
							<a href="position">Manage Position</a>|
							<a href="cand.php">Manage Candidate</a>|
							<a href="bill.php">Manage Bill</a>|
							<a href="aresult.php">Manage Result</a>|
							<a href="logout.php">logout</a>|

						</div><br><br>
<!-- addd admin -->
<div class="container">
			<div class="col-md-12 col-lg-4">
			<div class="row">	
				<div class="card mycard">	
					<div class="card-body">
						<?php
		        error_reporting(0);
		      
		        if(isset($smmg)){
		            echo"<div class='alert alert-danger col-lg-12'>
		            <strong>Error! </strong>".$smmg."</div>";
		            
				}
				elseif(isset($gmmg)) {
					echo"<div class='alert alert-success col-lg-12'>
		            <strong>Success! </strong>".$gmmg."</div>";
				}
		  

		?>
						<form action="cand.php" method="POST">
								<h2>Add Candidate</h2>
								Candidate Name: <input type="text" name="fname" class="form-control ">	<br>
								Position : <select name="pos" class="form-control ">
                               <?php
                               $select = "SELECT * FROM position";
                               $query = mysqli_query($con,$select);
                               while($array = mysqli_fetch_array($query)){
                                $fn = $array['pos'];
                                   echo "<option>$fn</option>";
                               }
                               ?>
                               <option value=""></option>
                                </select>
								<input type="submit" name="reg" value="Add" class="bg-success btn">
								<!-- I have an account <a href="login.php"> login</a> -->


						</form>
					</div>
				</div>	
			</div>	
		</div>
</div>



						<div>	<br>	<br><br>
								<table border="1" class="table">	
									<tr>
										<th>Sno</th>
										<th>Candidate Name</th>
										<th>Position </th>
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
											$select = "SELECT * FROM candidate";
											$query = mysqli_query($con,$select);
											while($array = mysqli_fetch_array($query)){
												$fn = $array['pos'];
												$cn = $array['candName'];
										
												$id = $array['cid'];


												echo "<td>$s</td>
												<td>$cn</td>
												<td>$fn</td>
												<td><a href='delete_cand.php?roja=$id' class='btn bg-danger'>Delete</a></td>
												</tr>";
												$s++;
											}
										?>
									
								</table>
						</div>
				
					</div>
				</div>	
			</div>	
		</div>
</div>
</body>
</html>