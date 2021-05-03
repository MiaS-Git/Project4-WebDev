<?php
session_start();
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
	header("location:../user_login.php");
}

include('../include/connect.php');
$id=$_GET['id'];
$slot_id=$_GET['slot_id'];
//echo $slot_id;
$sql="DELETE FROM `parking_details` WHERE id='$id'";
$result=mysqli_query($conn,$sql);

$sql2="UPDATE `slot_master` SET `slot_status`= 0 WHERE slot_id=$slot_id";
//echo $sql2;exit;
header('location:../user_dashboard.php');
?>