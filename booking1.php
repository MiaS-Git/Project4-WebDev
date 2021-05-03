<?php
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("location:login.php");
}
include('include/connect.php');

$id = $_GET['id'];
//POST from select_datetime.php
$spot_date = $_POST['spot_date'];
$start_time = $_POST['start_time'];
$no_of_hr = $_POST['no_of_hr'];
$parking_type = $_POST['parking_type'];
$exit_time = date('H:i', strtotime($start_time . '+ ' . $no_of_hr . ' hour'));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm a spot</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <style>
        .btn {
            border-radius: 0;
        }

        .btn-outline-primary,
        .btn-danger {
            margin-top: 25px;
            margin-bottom: 8px;
        }

        .container {
            padding-top: 20px;
        }

        body {
            position: auto;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Select a spot</h3>
        <div class="row">
            <?php
            $sql_slot = "SELECT * FROM spots";
            $result_slot = mysqli_query($conn, $sql_slot);
            while ($data = mysqli_fetch_array($result_spot)) {
                if ($data['spot_status'] == 0) {
            ?>
                    <div class="col-lg-2">
                        <hr>
                        <a type=" button" class="btn btn-outline-primary btn-lg btn-block" href="include/confirm_spot.php?spot_id=<?php echo $data['spot_id']; ?>&&id=<?php echo $id; ?>">Spot
                            <?php echo $data['spot_id']; ?>
                        </a>
                    </div>
                    <?php } else if ($data['spot_status'] == 1) {
                    $sql_time = "SELECT * FROM parking_details";
                    $result_time = mysqli_query($conn, $sql_time);
                    $row_time = mysqli_fetch_assoc($result_time);

                    if (($start_time < $row_time['start_time'] && $exit_time <= $row_time['start_time']) ||
                        ($start_time >= $row_time['exit_time'] && $exit_time > $row_time['exit_time'])
                    ) {
                    ?>
                        <div class="col-lg-2">
                            <hr>
                            <a type=" button" class="btn btn-outline-primary btn-lg btn-block" href="include/confirm_spot.php?spot_id=<?php echo $data['spot_id']; ?>&&id=<?php echo $id; ?>">Spot
                                <?php echo $data['spot_id']; ?>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-2">
                            <hr>
                            <button type="button" class="btn btn-danger btn-lg btn-block" disabled>Spot
                                <?php echo $data['spot_id']; ?>
                            </button>
                        </div>
            <?php  }
                }
            } ?>
            <br>
            <p>
                <small>
                    <img src="images/icon/red_block.png" height="20px" width="20px" style="border:1px solid;">
                    spot already booked<br>
                    <img src=" images/icon/white_block.png" height="20px" width="20px" style="border:1px solid;">
                    spot available
                </small>
            </p>
        </div>
    </div>
</body>

</html>

<?php
$sql_user = "SELECT * FROM users WHERE id='$id'";
$result_user = mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_name = $row_user['user_name'];
if (isset($_POST['submit'])) {
    $sql_check = "SELECT * FROM parking_details WHERE id='$id'";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_fetch_assoc($result_check) == 0) {
        $sql = "INSERT INTO `parking_details`(`user_name`,`id`, `spot_date`, `start_time`,`no_of_hr`,`exit_time`,`parking_type`) VALUES ('$user_name','$id','$spot_date','$start_time','$no_of_hr','$exit_time','$parking_type' )";

        $result = mysqli_query($conn, $sql);
    } else if (mysqli_fetch_assoc($result_check) == 1) {
        $sql = "UPDATE `parking_details` SET `spot_date`='$spot_date',`start_time`='$start_time',`no_of_hr`='$no_of_hr',`exit_time`='$exit_time', `parking_type`='$parking_type' WHERE $id='$id'";
        $result = mysqli_query($conn, $sql);
    }
}
?>
