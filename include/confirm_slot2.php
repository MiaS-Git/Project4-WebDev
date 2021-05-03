<?php
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("location:../user_login.php");
}

include('../include/connect.php');

$id = $_GET['id'];
$spot_id = $_GET['spot_id'];

$sql = "SELECT * FROM parking_details WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$start_time = $row['start_time'];
$spot_date = $row['spot_date'];

$booking_code = $id . $spot_id . $spot_date . $start_time;
//."-". rand(10*45, 100*98)

$sql3 = "UPDATE `spots` SET `spot_status`=1 WHERE spot_id=$spot_id";


$result3 = mysqli_query($conn, $sql3);


//ECHO $file2;exit;
$ecc = 'L';
$pixel_Size = 20;
$frame_Size = 5;


$sql2 = "UPDATE `parking_details` SET `spot_id`='$spot_id',`booking_code`='$booking_code' WHERE id=$id";
$result2 = mysqli_query($conn, $sql2);
//echo $sql2;exit;
$sql3 = "SELECT * FROM `users` WHERE `id`='$id'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);

//echo "<center><img src='".$file."'></center>"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Ticket</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .fa {
            color: black;
            padding: 10px;
        }

        .container {
            padding-top: 20px;
        }

        .card {
            border-radius: 0px;
        }

        .btn {
            border-radius: 0px;
        }

        h5 {
            font-size: 20px;
            padding: 10px;
        }

        small {
            font-size: 15px;
        }
        .topnav {
 	 overflow: hidden;
  	background-color: white;
	}

	.topnav a {
 	 float: right;
 	 color: black;
  	text-align: center;
  	padding: 14px 16px;
  	text-decoration: right;
  	font-size: 17px;
	}
	
	.topnav a:hover {
 	 background-color: #ddd;
  	color: black;
	}

	.topnav a.active {
 	 background-color: #04AA6D;
  	color: white;
	}
    </style>
</head>



<body>
	<div class="topnav">
		<a href="profile.php">Profile</a>
  		<a href="checkout.html">Checkout</a>
		<a href="cart.html">Cart</a>
	</div>
    <div class="container">
        <div class="alert alert-success" role="alert">
            Sucessfully confirmed!
        </div>


        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <center>
                    <div class="card" style="width: 22rem;">
                        <h5>Parking Reservation</h5>
                        <small><?php echo date("d-m-Y") . ' ' . date("h:iA"); ?></small>
                        <hr>
                        <div class="card" style="padding:2px;border: 2px solid black;border-left:none;border-right:0px;border-radius:0px;">
                            TICKET NUMBER :
                            <?PHP echo $booking_code ?>
                        </div>
                        <ul class="list-group list-group-flush">
                            <h4 class="card-text"><?php echo strtoupper($row3['uname']); ?></h4>
                            <li class="list-group-item">SPOT NUMBER : <?php echo $spot_id; ?></li>
                            <li class="list-group-item">DATE :5/4/2021</li>
                            <li class="list-group-item">TIME : 3:25pm</li>
                            <li class="list-group-item">TOTAL PRICE : $250</li>

                        
                        </ul>
                    </div>
                    <div>
                        </a>
                    </div>

                </center>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    </div>


</body>

</html>
