<?php
session_start();
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
	header("location:../login.php");
}

include('../include/connect.php');
$id=$_GET['id'];
$slot_id=$_GET['spot_id'];
//echo $slot_id;
$sql="DELETE FROM `parking_details` WHERE id='$id'";
$result=mysqli_query($conn,$sql);

$sql2="UPDATE `spots` SET `spot_status`= 0 WHERE spot_id=$spot_id";
//echo $sql2;exit;
header('location:../user_dashboard.php');
?>
