<?php

    include("config.php");

    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    $sql = 'CREATE TABLE IF NOT EXISTS `users` '
        .'(id int(20) AUTO_INCREMENT,'
        .'user_name varchar(60),'
        .'password varchar(60),'
        .'first_name varchar(60),'
        .'last_name varchar(60),'
        .'email varchar(60),'
        .'primary key (id))';

    mysqli_query($conn, $sql);

    $sql = 'CREATE TABLE IF NOT EXISTS `orders` '
        .'(`id` int NOT NULL AUTO_INCREMENT,'
        .'`street` varchar(100) DEFAULT NULL,'
        .'`city` varchar(45) DEFAULT NULL,'
        .'`state` varchar(45) DEFAULT NULL,'
        .'`phone` varchar(45) DEFAULT NULL,'
        .'`zipcode` varchar(45) DEFAULT NULL,'
        .'`country` varchar(45) DEFAULT NULL,'
        .'`cardCVV` varchar(45) DEFAULT NULL,'
        .'`cardExpiration` varchar(45) DEFAULT NULL,'
        .'`cardName` varchar(45) DEFAULT NULL,'
        .'`cardNumber` varchar(45) DEFAULT NULL,'
        .'`totalOrder` decimal(11,2) DEFAULT NULL,'
        .'PRIMARY KEY (`id`)'
        .') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;';

    mysqli_query($conn, $sql);

    $sql = 'CREATE TABLE IF NOT EXISTS `order_details`('
        .'`id` int NOT NULL AUTO_INCREMENT,'
        .'`orderid` int NOT NULL,'
        .'`product` varchar(100) NOT NULL,'
        .'`quantity` int NOT NULL,'
        .'`price` decimal(11,2) NOT NULL,'
        .'PRIMARY KEY (`id`)'
        .') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;';

    mysqli_query($conn, $sql);      
    
    $sql = 'CREATE TABLE IF NOT EXISTS rental ('
        .'`car_type` VARCHAR(45) NOT NULL,'
        .'`price` DECIMAL(11,2) NOT NULL,'
        .'PRIMARY KEY (`car_type`));';

    mysqli_query($conn, $sql); 
        
$sql = 'CREATE TABLE `parking_details` ('
          '`pid` int(2) NOT NULL,'
        '  `spot_id` int(2) NOT NULL,'
        '  `uname` varchar(50) NOT NULL,'
          '`id` int(2) NOT NULL,'
         ' `spot_date` varchar(10) NOT NULL,'
         ' `start_time` varchar(6) NOT NULL,'
         ' `no_of_hr` int(2) NOT NULL,'
         ' `parking_type` int(3) NOT NULL,'
         ' `exit_time` varchar(6) NOT NULL,'
         ' `booking_code` varchar(100) NOT NULL'
        ') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;'
    
    mysqli_query($conn, $sql); 

  $sql =  'CREATE TABLE `spots` ('
          '`spot_id` int(2) NOT NULL,'
          '`spot_no` varchar(3) NOT NULL,'
          '`spot_status` int(2) NOT NULL'
        ') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;'
      
        mysqli_query($conn, $sql); 
    $sql = "INSERT INTO `slot_master` (`slot_id`, `slot_no`, `slot_status`) VALUES (1, '1', 0),(2, '2', 0),(3, '3', 0),(4, '4', 0),(5, '5', 0),(6, '6', 0),(7, '7', 0),(8, '8', 0),(9, '9', 1),(10, '10', 0),(11, '11', 0),(12, '12', 0),(13, '13', 0),(14, '14', 0),(15, '15', 0),(16, '16', 0),(17, '5', 0),(18, '18', 0),(19, '19', 0),(20, '20', 0),(21, '21', 1),(22, '22', 0),(23, '23', 0),(24, '24', 0);"

    $sql = "INSERT IGNORE INTO rental(car_type, price) VALUES ('SUV', 200.99);";
    mysqli_query($conn, $sql);          

    $sql = "INSERT IGNORE INTO rental(car_type, price) VALUES ('Compact', 59.99);";
    mysqli_query($conn, $sql);          

    $sql = "INSERT IGNORE INTO rental(car_type, price) VALUES ('Midsize', 100.99);";
    mysqli_query($conn, $sql);          

    $sql = "INSERT IGNORE INTO rental(car_type, price) VALUES ('Luxury', 500.99);";
    mysqli_query($conn, $sql);          

?>
