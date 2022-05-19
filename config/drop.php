<?php

    include_once('database.php');
    $drop = new database();

    try {
        $dbh = new PDO($drop->db_dsn, $drop->db_user, $drop->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "DROP DATABASE IF EXISTS `$drop->db_name` ";
        $dbh->exec($query);
        echo "<h1>Database droped successfully</h1>\n";
    }
    catch (PDOException $e) {
        echo "Error droping Database: \n" . $e->getMessage() . "\n";
    }

?>
