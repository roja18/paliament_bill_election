<?php
require_once("connect.php");
if(isset($_POST["reg"])){
    $uname=$_POST["uname"];
    $pass=$_POST["pass"];

    if(empty($uname) || empty($pass)){
        $sms= "you must fill username and password";
    }
    else{
        $select="SELECT passwordz,usertype,statuz FROM userz WHERE username='$uname'";
        // echo $select;
        // die();
        $query=mysqli_query($con,$select);
        $ray=mysqli_fetch_array($query);
        $paw=$ray['passwordz'];
        $utype=$ray['usertype'];
        $statuz=$ray['statuz'];



       
        if(password_verify($pass,$paw)){
            if($utype=="Admin" && $statuz=="active"){
                session_start();
                $_SESSION['Admin']=$uname;
                header("location:dashbord.php");
            }
            elseif($utype=="user" && $statuz=="active"){
                session_start();
                $_SESSION['user']=$uname;
                header("location:user_dash.php");
            }
            
            
            else{
                $sms="You must activate your account";
            }
        }
        else{
            $sms="wrong username or password";
        }
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
fieldset{
    width:30%;
    margin: auto;
    padding: 15px 12px;
    border-radius: 13%;
    opacity: 1;
    border-radius: 5%;
    box-shadow: 13px 13px 20px #aa8e12, -8px -8px 20px #dfaf2b;
   
}

</style>

</head>
<body>
<div class="jumbotron bg-warning ">
  <h1 class="text-center display-1 text-light mb-4">Parliamentary Bill Voting System</h1>
</div>
<div class="container mb-4">
	<fieldset class="bg-warning">
   
		
						<?php
		        error_reporting(0);
		      
		        if(isset($sms)){
		            echo"<div class='alert alert-danger col-lg-12'>
		            <strong>Error! </strong>".$sms."</div>";
		            
		        }
		  

		?>
						<form action="index.php" method="POST">
								<h2>Login Form</h2>
							
								User Name: <input type="text" name="uname" class="form-control">	
							
							
								Password: <input type="Password" name="pass" class="form-control">	<br>	
								<input type="submit" name="reg" value="Login" class="bg-success">
								<input type="reset" name="" value="Clean" class="bg-warning"><br>	<br>
								Forget password <a href="index.php"> Reset</a>
								<!-- I have an account <a href="login.php"> login</a> -->


						</form>
		</fieldset>			
</div>
</body>
</html>