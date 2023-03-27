<?php
require_once("connect.php");
if(isset($_POST['reg'])){
	$cand = trim(stripslashes(htmlentities(strip_tags(trim($_POST['fname'])))));


	$inset = "INSERT INTO bill(bname) VALUES ('$cand')";
	// echo $inset;
	// die;
	$ney=mysqli_query($con,$inset);
          if($ney){
          	session_start();
          	$rand = rand(00000,99999);
          	$_SESSION['bill'] = $rand;
			$gmmg= "success to add Bill";
          }

          else{
              $smmg= "Fail to add";
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


    
        <h2>Manage Bill</h2><hr>
        <fieldset class="bg-warning">
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
						<form action="bill.php" method="POST">
								
								Bill: <textarea name="fname" class="form-control" placeholder="Write Bill here"></textarea> <br>
								<input type="submit" name="reg" value="Add" class="bg-success btn">
								<!-- I have an account <a href="login.php"> login</a> -->


						</form>
                        </fieldset>	<br><br>


                        <h3>List of Bill</h3>
                        <table border="1" class="table">	
									<tr>
										<th>Sno</th>
										<th>Bill</th>
										<th>Date </th>
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
											$select = "SELECT * FROM bill";
											$query = mysqli_query($con,$select);
											while($array = mysqli_fetch_array($query)){
												$fn = $array['bname'];
												$cn = $array['bdate'];
										
												$id = $array['bid'];


												echo "<td>$s</td>
												<td>$fn</td>
												<td>$cn</td>
												<td><a href='delete_bill.php?roja=$id' class='btn bg-danger'>Delete</a></td>
												</tr>";
												$s++;
											}
										?>
									
								</table>             
	</div>
</div>
</body>
</html>