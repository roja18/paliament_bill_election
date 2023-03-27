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
		<?php include_once("aleft.php"); ?>
	</div>
	<div class="right">
	<table class="table">
		<tr>
			<th>
				<?php 
				session_start();
                if(empty($_SESSION['Admin'])){
                        header("location:login.php");
                      }
                    require_once("connect.php");
                        $selec = "SELECT COUNT(*) AS me FROM userz " ;
						$quer = mysqli_query($con,$selec);
						$row=mysqli_fetch_array($quer);
						$prod = $row['me'];
						echo $prod."<br>";
							
				?>
				User
			</th>
			<th>
				<?php 
				
                    require_once("connect.php");
                        $selec = "SELECT COUNT(*) AS me FROM bill " ;
						$quer = mysqli_query($con,$selec);
						$row=mysqli_fetch_array($quer);
						$prod = $row['me'];
						echo $prod."<br>";
							
				?>	
			Bill</th>
			<th>
			<?php 
				
				require_once("connect.php");
					$selec = "SELECT COUNT(*) AS me FROM result " ;
					$quer = mysqli_query($con,$selec);
					$row=mysqli_fetch_array($quer);
					$prod = $row['me'];
					echo $prod."<br>";
						
			?>
			Result</th>
			
		</tr>
	</table>
   
	</div>
</div>
</body>
</html>