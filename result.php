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
  
  <div class="col-md-12 col-sl-12 col-lg-12 md-4">
  <div class="row">

  <?php
              session_start();
                if(empty($_SESSION['user'])){
                        header("location:login.php");
                      }
                    require_once("connect.php");
                        $selec = "SELECT bill.bdate,result.bid,bill.bname,COUNT(IF(result='YES',1,NULL))AS YESS,COUNT(IF(result='NO',1,NULL))AS NOO,COUNT(result.bid) AS TOTAL,ROUND((COUNT(IF(result='YES',1,NULL))/COUNT(result.bid))*100) AS AVR FROM result,bill WHERE result.bid=bill.bid GROUP by result.bid" ;
                        $quer = mysqli_query($con,$selec);
                        
                        while($row=mysqli_fetch_array($quer)){
                            $prod = $row['bdate'];
                            $unity = $row['bname'];
                            $quart = $row['YESS'];
                            $price = $row['NOO'];
                            $detail = $row['TOTAL'];
                            $image = $row['AVR'];
                            // $id = $row['id'];

                            echo "<div class='col-md-6 md-4'>
                            <div class='card-deck-wrapper'>
                                <div class='card-deck'>
                                    <div class='card md-4'>
                                        <div class='card-body'>
                                     
                                       <div class='card-body'>
                            
                                       <p><b>Publish Date: </b>".$prod."<br>  
                                       <b>Bill: </b>".$unity."<br> 
                                        <b>YES: </b>".$quart."<br> 
                                        <b>NO: </b>".$price."<br> 
                                        <b>Total Vote: </b>".$detail."<br> 
                                        <b>Pacent: </b>".$image."%<br> 
                                        
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> ";
                            
                        }
                    
                    ?>
  </div>
  </div>  


	</div>
</div>
</body>
</html>