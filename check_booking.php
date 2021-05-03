<?php
//SESSION
session_start();
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
	header("location:login.php");
}
include('include/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <style>
    .container {
        padding-top: 20px;
    }

    .alert {
        border-radius: 0px;
    }
    </style>
</head>

<body>

    <div class="container">
        <?php
    $user_id=$_GET['id'];

    $check="SELECT * FROM parking_details where id='$id'";
    //echo $sql;
    //exit;
    $result_check=mysqli_query($conn,$check);

    if($data=mysqli_num_rows($result_check) == 1){ 
        ?>
        <div class="alert alert-dark" role="alert">
            You already have booking!<a href="user_dashboard.php"> Go Back</a>
        </div>
        <?php
        } else {
        header("location:include/select_datetime.php?id=".$id);
        }
        ?>

</body>

</html>
