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

    //Create table for customers
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE TABLE `customer` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `customer_name` text NULL,
            `customer_address` varchar(250) NOT NULL,
            `total_before_tax` decimal(10,2) NOT NULL,
            `total_tax` decimal(10,2) NOT NULL,
            `tax_per_item` varchar(250) NOT NULL,
            `after_tax` double(10,2) NOT NULL,
            `amount_paid` decimal(10,2) NOT NULL,
            `amount_due` decimal(10,2) NOT NULL,
            `note` text NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin";
        $dbh->exec($query);
        echo "Users Table Created Successfully <br />";
    }
    catch (PDOException $e) {
        echo "Error Creating Table: " .$e->getMessage(). "<br /> Aborting process <br />";
    }

    //Create table for invoice item
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE TABLE `posts` (
            `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `invoice_id` INT(11) NOT NULL,
            `invoice_code` varchar(50) NOT NULL,
            `invoice_name` varchar(50) NOT NULL,
            `quantity` decimal(10,2) NOT NULL,
            `amount` decimal(10,2) NULL,
            `final_amount` decimal(10,2) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin";
        $dbh->exec($query);
        echo "Posts Table Created Successfully<br />";
    }
    catch (PDOException $e) {
        echo "Error Creating Posts Table: " .$e->getMessage(). "<br />Aborting process<br />";
    }

?>
