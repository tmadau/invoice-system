<?php

    include_once('database.php');
    
    $create = new database();
    try {
        $dbh = new PDO($create->db_dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE DATABASE IF NOT EXISTS `$create->db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ";
        $dbh->exec($query);
        echo "<h1>Database created successfully</h1>";
    }
    catch (PDOException $e) {
        echo "<h1>Error creating Database: </h1>" . $e->getMessage() . "<br />Aborting process";
        exit(-1);
    }

    //Create table for business
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE TABLE `business` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `business_name` varchar(250) NOT NULL,
            `business_address` text NOT NULL,
            `total_before_tax` decimal(10,2) NOT NULL,
            `total_tax` decimal(10,2) NOT NULL,
            `per_tax` varchar(250) NOT NULL,
            `after_tax_total` double(10,2) NOT NULL,
            `amount_paid` decimal(10,2) NOT NULL,
            `amount_due` decimal(10,2) NOT NULL,
            `note` text NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin";
        $dbh->exec($query);
        echo "business Table Created Successfully <br />";
    }
    catch (PDOException $e) {
        echo "Error Creating business Table: " .$e->getMessage(). "<br /> Aborting process <br />";
    }

    // Prepopulate database with information
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO `business` (`id`, `date`, `business_name`, `business_address`, `total_before_tax`, 
            `total_tax`, `per_tax`, `after_tax_total`, `amount_paid`, `amount_due`, `note`) 
            VALUES (2, '2022-01-31 14:03:42', 'abcd', 'Takalani - 4000, Orange Farm, Extension 3,\r\n 1841 South Africa.\r\n0722235069\r\ntakimadau@gmail.com', '142400.00', '584800.00', '100', 1227200.00, '15454.00', '181746.00', 'no comment'),
            (682, '2020-08-19 15:13:36', 'Absa ltd', 'South Africa Johannesburg', '150000.00', '7500.00', '1', 757500.00, '10000.00', '237500.00', 'no comment'),
            (683, '2018-08-19 16:54:15', 'Capitec', 'South Africa', '1224500.00', '12400.00', '2', 1246400.00, '10000.00', '1126400.00', 'no comment')";
        $dbh->exec($query);
        echo "Business table successfully prepopulated...........<br />";
    }
    catch (PDOException $e) {
        echo "Error prepopulating business table: " .$e->getMessage(). "<br /> Aborting process <br />";
    }

    //Create table for invoice item
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE TABLE `invoice` (
            `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `invoice_id` INT(11) NOT NULL,
            `invoice_code` varchar(50) NOT NULL,
            `invoice_name` varchar(50) NOT NULL,
            `quantity` decimal(10,2) NOT NULL,
            `amount` decimal(10,2) NULL,
            `final_amount` decimal(10,2) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin";
        $dbh->exec($query);
        echo "Invoice Table Created Successfully<br />";
    }
    catch (PDOException $e) {
        echo "Error Creating Invoice Table: " .$e->getMessage(). "<br />Aborting process<br />";
    }

    // Prepopulate invoice items
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO `invoice` (`invoice_id`, `id`, `invoice_code`, `invoice_name`, `quantity`, `amount`, `final_amount`
        ) VALUES (2, 4100, '13555', 'Face Mask', '120.00', '2000.00', '240000.00'),
            (2, 4101, '34', 'mobile', '10.00', '10000.00', '100000.00'),
            (2, 4102, '34', 'mobile battery', '1.00', '34343.00', '34343.00'),
            (2, 4103, '34', 'mobile cover', '10.00', '200.00', '2000.00'),
            (2, 4104, '36', 'testing', '1.00', '2400.00', '2400.00')";
        $dbh->exec($query);
        echo "Invoice table successfully prepopulated...........<br />";
    }
    catch (PDOException $e) {
        echo "Error prepopulating invoice table: " .$e->getMessage(). "<br />Aborting process<br />";
    }

?>
