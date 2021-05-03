<?php
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("location:../user_login.php");
}

include('../include/connect.php');
$id = $_GET['id'];
$slot_id = $_GET['slot_id'];
include('../include/connect.php');

$sql_datetime = "SELECT * FROM parking_details WHERE id='$id'";
$result_datetime = mysqli_query($conn, $sql_datetime);
$row_datetime = mysqli_fetch_assoc($result_datetime);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Slot</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />

    <style>
        .card {
            border: 1px solid black;
            border-radius: 0px;
        }

        .btn {
            border-radius: 0px;
        }

        .container {
            margin-top: 200px;
            position: auto;

        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class=" card-header">
                       Can you confirm?
                    </div>
                    <div class="card-body">
                        <center>
                            <h4>
                                <p>YOU SELECTED <b></Select> SPOT <?php echo $slot_id; ?></b><br>
                                    DATE: 5/4/2021 <b><?php echo $row_datetime['slot_date']; ?></b><br>
                                    ENTRY TIME: 3:25pm <b><?php echo $row_datetime['start_time']; ?></b><br>
                                    EXIT TIME: 5:25pm<b><?php echo $row_datetime['exit_time']; ?></b><br>
                                </p>
                            </h4>

                        </center>
                        <form action="confirm_slot2.php?id=<?php echo $id; ?>&&slot_id=<?php echo $slot_id; ?>" method="post">
                            <center>
                                <button type="submit" name="submit" class="btn btn-success">YES</button>


                                <a href="cancel_slot.php?id=<?php echo $id; ?>&&slot_id=<?php echo $slot_id; ?>" class="btn btn-primary">NO</a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

</body>

</html>