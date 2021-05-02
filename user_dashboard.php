<?php

include('include/connect.php');
$user_id = 1;
$sql = "SELECT * FROM `users` WHERE uid=$uid";
//echo $sql;exit;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
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
        body {
            position: auto;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .container {
            padding-top: 20px;
        }

        .btn {
            border-radius: 0px;
        }

        .jumbotron {
            border-radius: 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-5">
                <?php echo "WELCOME "; ?> <b> <?php echo strtoupper($row['uname']); ?>! </b>
            </h1>
            <p class="lead">List & Rent your Space for Parking.</p>
            <center>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="check_booking.php?uid=<?php echo $row['uid'] ?>" role="button">Book</a>
            </center>
        </div>
    </div>

</body>

</html>
