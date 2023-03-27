<?php
session_start();
if(isset($_SESSION['Admin'])){
    unset($_SESSION['Admin']);
    session_destroy();
header("location:index.php");
}
?>