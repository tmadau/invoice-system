<?php

    include_once('database.php');
    $drop = new database();

    try {
        $dbh = new PDO($drop->db_dsn, $drop->db_user, $drop->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "DROP DATABASE IF EXISTS `$drop->db_name` ";
        $dbh->exec($query);
        echo "Database droped successfully\n";
    }
    catch (PDOException $e) {
        echo "Error droping Database: \n" . $e->getMessage() . "\n";
    }

?>
